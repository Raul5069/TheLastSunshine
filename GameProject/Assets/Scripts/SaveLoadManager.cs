using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class SaveLoadManager : MonoBehaviour
{
    public static SaveLoadManager Instance { get; set; }
    string highestWaveKey = "sok";

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

        DontDestroyOnLoad(this);
    }

    public void SaveHighestWaves(int wave)
    {
        PlayerPrefs.SetInt(highestWaveKey, wave);
    }

    public int LoadHighestWaves()
    {
        if(PlayerPrefs.HasKey(highestWaveKey))
        {
            return PlayerPrefs.GetInt(highestWaveKey);
        }
        else
        {
            return 0;
        }
    }
}
