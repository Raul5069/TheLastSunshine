using System.Collections;
using System.Collections.Generic;
using TMPro;
using UnityEngine;

public class HUDManager : MonoBehaviour
{
    public static HUDManager Instance { get; set; }

    public GameObject middlePoint;

    [Header("Ammo")]
    public TextMeshProUGUI ammoDisplay;

    [Header("Weapon")]
    public TextMeshProUGUI activeWeaponUI;
    public TextMeshProUGUI hoveredWeaponUI;
    public TextMeshProUGUI hoveredAmmoCrateUI;
    public TextMeshProUGUI reloadUI;

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

    private void Update()
    {
        Weapon activeWeapon = WeaponManager.Instance.activeWeaponSlot.GetComponentInChildren<Weapon>();
        if(activeWeapon)
        {
            ammoDisplay.text = $"{activeWeapon.bulletsLeft / activeWeapon.bulletsPerBurst}/{activeWeapon.ammoLeft / activeWeapon.bulletsPerBurst}";
            activeWeaponUI.text = activeWeapon.name;
        }
        else
        {
            ammoDisplay.text = "";
            activeWeaponUI.text = "";
        }
    }
}
