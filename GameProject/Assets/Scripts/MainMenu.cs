using System.Collections;
using System.Collections.Generic;
using TMPro;
using UnityEngine;
using UnityEngine.SceneManagement;
using UnityEngine.UI;

public class MainMenu : MonoBehaviour
{
    public static MainMenu Instance { get; set; }

    public TMP_Text usernameUI;
    public TMP_Text highestWaveUI;
    public Button starButton;

    string newGameScene = "OutDoorsScene";

    public AudioClip bg_music;
    public AudioSource main_channel;

    private void Awake()
    {
        if (Instance != null && Instance != this)
        {
            Destroy(gameObject);
        }
        else
        {
            Instance = this;
        }
    }

    void Start()
    {
        main_channel.PlayOneShot(bg_music);
        Cursor.lockState = CursorLockMode.None;
        string highestWave = DBManager.highestwave.ToString(); //SaveLoadManager.Instance.LoadHighestWaves();
        highestWaveUI.text = $"A legtöbb kör, amit túléltél: {highestWave}";
        usernameUI.text = DBManager.username;
    }

    public void StartNewGame()
    {
        main_channel.Stop();
        SceneManager.LoadScene(newGameScene);
    }

    public void ExitGame()
    {
        Application.Quit();
    }

    public void Logout()
    {
        SceneManager.LoadScene(0);
    }
}
