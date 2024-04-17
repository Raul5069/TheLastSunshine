using System;
using System.Collections;
using System.Collections.Generic;
using TMPro;
using UnityEngine;
using Random = UnityEngine.Random;

public class ZombieSpawnerController : MonoBehaviour
{
    public int initialZombiesPerWave = 5;
    public int currentZombiesPerWave;

    public float spawnDelay = 0.5f;

    public int currentWave = 0;
    public float waveCooldown = 13f;
    public TextMeshProUGUI currentWaveUI;

    public bool inCoolDown;
    public float cooldownCounter = 0;

    public AudioClip bg_music;
    public AudioSource main_channel;

    public List<Zombie> currentZombiesAlive;

    public GameObject zombiePrefab;

    private void Start()
    {
        currentZombiesPerWave = initialZombiesPerWave;
        GlobalReferences.Instance.waveNumber = currentWave;
        StartNextWave();
    }

    private void StartNextWave()
    {
        main_channel.Stop();
        currentZombiesAlive.Clear();
        currentWave++;
        currentWaveUI.text = currentWave.ToString();
        GlobalReferences.Instance.waveNumber = currentWave;
        StartCoroutine(SpawnWave());
    }

    private IEnumerator SpawnWave()
    {
        for (int i = 0; i < currentZombiesPerWave; i++)
        {
            Vector3 spawnOffset = new Vector3(Random.Range(-13f, 13f), 0f, Random.Range(-13f, 13f));
            Vector3 spawnPosition = transform.position + spawnOffset;

            var zombie = Instantiate(zombiePrefab, spawnPosition, Quaternion.identity);

            Zombie zombieScript = zombie.GetComponent<Zombie>();

            currentZombiesAlive.Add(zombieScript);

            yield return new WaitForSeconds(spawnDelay);
        }
    }

    private void Update()
    {
        List<Zombie> zombiesToRemove = new List<Zombie>();
        foreach(Zombie zombie in currentZombiesAlive)
        {
            if(zombie.isDead)
            {
                zombiesToRemove.Add(zombie);
            }
        }

        foreach(Zombie zombie in zombiesToRemove)
        {
            currentZombiesAlive.Remove(zombie);
        }

        zombiesToRemove.Clear();

        if(currentZombiesAlive.Count == 0 && inCoolDown == false)
        {
            StartCoroutine(WaveCooldown());
        }

        if(inCoolDown)
        {
            cooldownCounter -= Time.deltaTime;
        }
        else
        {
            cooldownCounter = waveCooldown;
        }
    }

    private IEnumerator WaveCooldown()
    {
        inCoolDown = true;

        main_channel.PlayOneShot(bg_music);

        yield return new WaitForSeconds(waveCooldown);

        inCoolDown = false;

        currentZombiesPerWave += 5;
        StartNextWave();
    }
}
