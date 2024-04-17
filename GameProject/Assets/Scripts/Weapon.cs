using System;
using System.Collections;
using System.Collections.Generic;
using TMPro;
using UnityEngine;

public class Weapon : MonoBehaviour
{
    public bool isActiveWeapon;
    public int weaponDamage;

    [Header("Shooting")]
    public bool isShooting, readyToShoot;
    bool allowReset = true;
    public float shootingDelay = 0.2f;

    [Header("Burst")]
    public int bulletsPerBurst = 3;
    public int burstBulletsLeft;

    [Header("Spread")]
    public float spreadIntensity;
    public float hipSpreadIntensity;
    public float adsSpreadIntensity;

    [Header("Bullet")]
    public GameObject bulletPrefab;
    public Transform bulletSpawn;
    public float bulletVelocity = 30;
    public float bulletPrefabLifeTime = 3f;

    public GameObject muzzleEffect;
    internal Animator animator;

    [Header("Loading")]
    public float reloadTime;
    public int magazineSize, bulletsLeft;
    public int ammoLeft;
    public double reloadWarning;
    public bool isReloading;
    public int ammoForReload;

    public Vector3 spawnPosition;
    public Vector3 spawnRotation;

    bool isADS;

    public enum WeaponModel
    {
        M1911,
        M4_8,
        Uzi
    }

    public WeaponModel thisWeaponModel;

    public enum ShootingMode
    {
        Single,
        Burst,
        Auto
    }

    public ShootingMode currentShootingMode;

    private void Awake()
    {
        readyToShoot = true;
        burstBulletsLeft = bulletsPerBurst;
        animator = GetComponent<Animator>();
        bulletsLeft = magazineSize;
        ammoLeft = magazineSize * 10;
        reloadWarning = magazineSize * 0.25;
        spreadIntensity = hipSpreadIntensity;
    }

    // Update is called once per frame
    void Update()
    {
        if(isActiveWeapon)
        {
            if(Input.GetMouseButtonDown(1))
            {
                EnterADS();
            }

            if (Input.GetMouseButtonUp(1))
            {
                ExitADS();
            }

            if (bulletsLeft == 0 && isShooting)
            {
                SoundManager.Instance.emptyMagazineSoundM1911.Play();
            }

            if (currentShootingMode == ShootingMode.Auto)
            {
                //Holding Down Left Mouse Button
                isShooting = Input.GetKey(KeyCode.Mouse0);
            }
            else if (currentShootingMode == ShootingMode.Single || currentShootingMode == ShootingMode.Burst)
            {
                //Clicking Left Mouse Button Once
                isShooting = Input.GetKeyDown(KeyCode.Mouse0);
            }

            if (Input.GetKeyDown(KeyCode.R) && bulletsLeft < magazineSize && isReloading == false && ammoLeft > 0)
            {
                HUDManager.Instance.reloadUI.text = "";
                Reload();
            }

            if (readyToShoot && isShooting == false && isReloading == false && bulletsLeft <= 0 && ammoLeft > 0)
            {
                HUDManager.Instance.reloadUI.text = "";
                Reload();
            }

            if (readyToShoot && isShooting && bulletsLeft > 0)
            {
                burstBulletsLeft = bulletsPerBurst;
                FireWeapon();
            }

            if(bulletsLeft <= 0 && ammoLeft <= 0)
            {
                isReloading = false;
            }

            if(bulletsLeft <= reloadWarning)
            {
                HUDManager.Instance.reloadUI.text = "Újratöltés R";
            }
            else
            {
                HUDManager.Instance.reloadUI.text = "";
            }
        }
    }

    private void EnterADS()
    {
        animator.SetTrigger("enterADS");
        isADS = true;
        HUDManager.Instance.middlePoint.SetActive(false);
        spreadIntensity = adsSpreadIntensity;
    }

    private void ExitADS()
    {
        animator.SetTrigger("exitADS");
        isADS = false;
        HUDManager.Instance.middlePoint.SetActive(true);
        spreadIntensity = hipSpreadIntensity;
    }

    private void FireWeapon()
    {
        bulletsLeft--;

        muzzleEffect.GetComponent<ParticleSystem>().Play();
        
        if(isADS)
        {
            animator.SetTrigger("RECOIL_ADS");
        }
        else
        {
            animator.SetTrigger("RECOIL");
        }
        
        SoundManager.Instance.PlayShootingSound(thisWeaponModel);

        readyToShoot = false;
        Vector3 shootingDirection = CalculateDirectionAndSpread().normalized;

        //Instantiate the bullet
        GameObject bullet = Instantiate(bulletPrefab, bulletSpawn.position, Quaternion.identity);

        Bullet bul = bullet.GetComponent<Bullet>();
        bul.bulletDamage = weaponDamage;
        
        //Pointing the bullet to face the shooting direction
        bullet.transform.forward = shootingDirection;
        
        //Shoot the bullet
        bullet.GetComponent<Rigidbody>().AddForce(shootingDirection * bulletVelocity, ForceMode.Impulse);
        
        //Destroy the bullet after some time
        StartCoroutine(DestroyBulletAfterTime(bullet, bulletPrefabLifeTime));
        //checking if we are done shooting
        if(allowReset)
        {
            Invoke("ResetShot", shootingDelay);
            allowReset = false;
        }
        //Burst mode
        if(currentShootingMode == ShootingMode.Burst && burstBulletsLeft > 1) //we already shoot once before this check
        {
            burstBulletsLeft--;
            Invoke("FireWeapon", shootingDelay);
        }
    }

    private void Reload()
    {
        SoundManager.Instance.PlayReloadSound(thisWeaponModel);
        animator.SetTrigger("RELOAD");
        isReloading = true;
        readyToShoot = false;
        isShooting = false;
        Invoke("ReloadCompleted", reloadTime);
    }

    private void ReloadCompleted()
    {
        ammoForReload = magazineSize - bulletsLeft;
        if(ammoLeft > magazineSize)
        {
            bulletsLeft = magazineSize;
            ammoLeft -= ammoForReload;
        }
        else
        {
            bulletsLeft = ammoLeft;
            ammoLeft -= bulletsLeft;
        }
        
        isReloading = false;
        readyToShoot = true;
    }

    private void ResetShot()
    {
        readyToShoot = true;
        allowReset = true;

    }

    public Vector3 CalculateDirectionAndSpread()
    {
        //Shooting from the middle of the screen to check where are we pointing at
        Ray ray = Camera.main.ViewportPointToRay(new Vector3(0.5f, 0.5f, 0));
        RaycastHit hit;

        Vector3 targetPoint;
        if(Physics.Raycast(ray, out hit))
        {
            //Hitting Something
            targetPoint = hit.point;
        }
        else
        {
            //Shooting at the air
            targetPoint = ray.GetPoint(100);
        }

        Vector3 direction = targetPoint - bulletSpawn.position;

        float z = UnityEngine.Random.Range(-spreadIntensity, spreadIntensity);
        float y = UnityEngine.Random.Range(-spreadIntensity, spreadIntensity);
        //returning the shooting direction and the spread
        return direction + new Vector3(0, y, z);
    }

    private IEnumerator DestroyBulletAfterTime(GameObject bullet, float delay)
    {
        yield return new WaitForSeconds(delay);
        Destroy(bullet);
    }
}
