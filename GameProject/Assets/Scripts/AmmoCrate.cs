using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class AmmoCrate : MonoBehaviour
{
    public int ammoAmount = 750;
    public AmmoType ammoType;
    public enum AmmoType
    {
        M1911Ammo,
        M4_8Ammo,
        UziAmmo
    }
}
