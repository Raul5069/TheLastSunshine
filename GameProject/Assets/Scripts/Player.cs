using System;
using System.Collections;
using System.Collections.Generic;
using TMPro;
using UnityEngine;
using UnityEngine.Networking;
using UnityEngine.SceneManagement;
using UnityEngine.UI;

public class Player : MonoBehaviour
{
    public int HP = 100;
    public GameObject bloodyScreen;

    public TextMeshProUGUI playerHealthUI;
    public GameObject gameOverUI;

    string newGameScene = "MainMenu";

    public AudioClip death_music;
    public AudioSource main_channel;

    public bool isDead;

    private void Start()
    {
        playerHealthUI.text = $"Életerõ: {HP}";
    }

    public void TakeDamage(int damageAmount)
    {
        HP -= damageAmount;

        if (HP <= 0)
        {
            SoundManager.Instance.playerChannel.PlayOneShot(SoundManager.Instance.playerDeath);
            PlayerDead();
            isDead = true;
        }
        else
        {
            SoundManager.Instance.playerChannel.PlayOneShot(SoundManager.Instance.playerHurt);
            StartCoroutine(BloodyScreenEffect());
            playerHealthUI.text = $"Életerõ: {HP}";
        }

        if(HP < 100)
        {
            StartCoroutine(HelthRegeneration(HP));
        }
    }

    private IEnumerator HelthRegeneration(int hP)
    {
        yield return new WaitForSeconds(10f);
        HP = 100;
        playerHealthUI.text = $"Életerõ: {HP}";
    }

    private void PlayerDead()
    {
        HUDManager.Instance.middlePoint.SetActive(false);
        main_channel.PlayOneShot(death_music);

        GetComponent<MouseMovement>().enabled = false;
        GetComponent<PlayerMovement>().enabled = false;

        GetComponentInChildren<Animator>().enabled = true;
        playerHealthUI.gameObject.SetActive(false);

        GetComponent<ScreenFader>().StartFade();
        StartCoroutine(ShowGameOverUI());
    }

    private IEnumerator ShowGameOverUI()
    {
        yield return new WaitForSeconds(1f);
        gameOverUI.gameObject.SetActive(true);
        int waveSurvived = GlobalReferences.Instance.waveNumber - 1;

        if(waveSurvived > DBManager.highestwave /*SaveLoadManager.Instance.LoadHighestWaves()*/)
        {
            DBManager.highestwave = waveSurvived;
            StartCoroutine(SavePlayerData());
            //SaveLoadManager.Instance.SaveHighestWaves(waveSurvived - 1);
        }

        StartCoroutine(BackToMainMenu());
    }

    IEnumerator SavePlayerData()
    {
        WWWForm form = new WWWForm();
        form.AddField("id", DBManager.id);
        form.AddField("highestwave", DBManager.highestwave);
        WWW www = new WWW("http://localhost/weboldalak/GameAuthentication/highestwave.php", form);
        yield return www;
    }

    private IEnumerator BackToMainMenu()
    {
        yield return new WaitForSeconds(10f);
        main_channel.Stop();
        SceneManager.LoadScene(newGameScene);
    }

    private IEnumerator BloodyScreenEffect()
    {
        if (bloodyScreen.activeInHierarchy == false)
        {
            bloodyScreen.SetActive(true);
        }

        var image = bloodyScreen.GetComponentInChildren<Image>();

        // Set the initial alpha value to 1 (fully visible).
        Color startColor = image.color;
        startColor.a = 1f;
        image.color = startColor;

        float duration = 1f;
        float elapsedTime = 0f;

        while (elapsedTime < duration)
        {
            // Calculate the new alpha value using Lerp.
            float alpha = Mathf.Lerp(1f, 0f, elapsedTime / duration);

            // Update the color with the new alpha value.
            Color newColor = image.color;
            newColor.a = alpha;
            image.color = newColor;

            // Increment the elapsed time.
            elapsedTime += Time.deltaTime;

            yield return null; ; // Wait for the next frame.
        }

        if (bloodyScreen.activeInHierarchy)
        {
            bloodyScreen.SetActive(false);
        }
    }

    private void OnTriggerEnter(Collider other)
    {
        if(other.CompareTag("ZombieHand"))
        {
            if(isDead == false)
            {
                TakeDamage(other.gameObject.GetComponent<ZombieHand>().damage);
            }
            
        }
    }
}
