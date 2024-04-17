using System.Collections;
using System.Collections.Generic;
using TMPro;
using UnityEngine;
using UnityEngine.SceneManagement;

public class MainMenu : MonoBehaviour
{
    public TMP_Text highestWaveUI;

    string newGameScene = "OutDoorsScene";

    public AudioClip bg_music;
    public AudioSource main_channel;
    void Start()
    {
        main_channel.PlayOneShot(bg_music);
        Cursor.lockState = CursorLockMode.None;
        int highestWave = SaveLoadManager.Instance.LoadHighestWaves();
        highestWaveUI.text = $"A legt�bb hull�m, amit t�l�lt�l: {highestWave}";
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
}
