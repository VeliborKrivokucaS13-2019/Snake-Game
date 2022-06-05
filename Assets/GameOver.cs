using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.SceneManagement;
using UnityEngine.UI;
using System;
using System.Globalization;

public class GameOver : MonoBehaviour
{
    public string highscoreURL = "http://localhost/sqlconnect/gethighscore.php";
    public Text HighScore;

    void Start()
    {
        StartCoroutine(GetHighScore());
    }

    // Get the scores from the MySQL DB to display in a GUIText.
    IEnumerator GetHighScore()
    {
        if (DBManager.LoggedIn)
        {
            WWWForm form = new WWWForm();
            form.AddField("name", DBManager.username);
            WWW www = new WWW("http://localhost/sqlconnect/gethighscore.php", form);
            yield return www;

            HighScore.text = "Highscore: " + www.text; // this is a GUIText that will display the highscore of the current player in game.
            DBManager.highscore = Int16.Parse(www.text);
            Debug.Log(DBManager.highscore);
        }
    }

    public void PlayAgain()
    {
        SceneManager.LoadScene(3);
    }
    public void GoToMainMenu()
    {
        SceneManager.LoadScene(0);
    }
}
