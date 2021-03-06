using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.SceneManagement;
using UnityEngine.UI;

public class MainMenu : MonoBehaviour
{
    public Text playerDisplay;

    void Start()
    {
        if (DBManager.LoggedIn)
        {
            playerDisplay.text = "Player " + DBManager.username;
        }
    }
    public void GoToRegister()
    {
        SceneManager.LoadScene(1);
    }
    public void GoToLogin()
    {
        SceneManager.LoadScene(2);
    }
    public void GoToGame()
    {
        SceneManager.LoadScene(3);
    }
    public void GoToLeaderboard()
    {
        SceneManager.LoadScene(4);
    }
}
