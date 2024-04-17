using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using static Weapon;

public class SoundManager : MonoBehaviour
{
    public static SoundManager Instance { get; set; }

    public AudioSource ShootingChannel;

    public AudioClip M1911Shot;
    public AudioClip M4_8Shot;

    public AudioSource reloadingSoundM1911;
    public AudioSource reloadingSoundM4_8;

    public AudioSource emptyMagazineSoundM1911;

    public AudioClip zombieRunning;
    public AudioClip zombieAttack;
    public AudioClip zombieHurt;
    public AudioClip zombieDeath;

    public AudioSource zombieChannel;
    public AudioSource zombieChannel2;

    public AudioSource playerChannel;
    public AudioClip playerHurt;
    public AudioClip playerDeath;

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

    public void PlayShootingSound(WeaponModel weapon)
    {
        switch(weapon)
        {
            case WeaponModel.M1911:
                ShootingChannel.PlayOneShot(M1911Shot);
                break;
            case WeaponModel.M4_8:
                ShootingChannel.PlayOneShot(M4_8Shot);
                break;
            case WeaponModel.Uzi:
                ShootingChannel.PlayOneShot(M1911Shot);
                break;
        }
    }

    public void PlayReloadSound(WeaponModel weapon)
    {
        switch (weapon)
        {
            case WeaponModel.M1911:
                reloadingSoundM1911.Play();
                break;
            case WeaponModel.M4_8:
                reloadingSoundM4_8.Play();
                break;
            case WeaponModel.Uzi:
                reloadingSoundM1911.Play();
                break;
        }
    }
}
