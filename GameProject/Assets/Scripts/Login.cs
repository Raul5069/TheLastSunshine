using System;
using System.Collections;
using System.Collections.Generic;
using TMPro;
using UnityEngine;
using UnityEngine.SceneManagement;
using UnityEngine.UI;

public class Login : MonoBehaviour
{
    public TMP_InputField emailField;
    public TMP_InputField passwordField;
    public TMP_Text errorUI;
    public Button loginButton;
    string newGameScene = "MainMenu";

    public void CallLogin()
    {
        StartCoroutine(LoginPlayer());
    }

    IEnumerator LoginPlayer()
    {
        WWWForm form = new WWWForm();
        form.AddField("email", emailField.text);
        form.AddField("password", passwordField.text);
        WWW www = new WWW("http://localhost/weboldalak/GameAuthentication/login.php", form);
        yield return www;

        if (www.text[0] == '0')
        {
            DBManager.username = www.text.Split(',')[1];
            DBManager.highestwave = Convert.ToInt32(www.text.Split(',')[2]);
            DBManager.id = Convert.ToInt32(www.text.Split(',')[3]);
            SceneManager.LoadScene(newGameScene);
        }
        else
        {
            errorUI.enabled = true;
            errorUI.text = www.text.Split(',')[0];
            Debug.Log(www.text.Split(',')[0]);
        }
    }

    public void ExitGame()
    {
        Application.Quit();
    }
}
