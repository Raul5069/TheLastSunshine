using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using static Weapon;

public class InteractionManager : MonoBehaviour
{
    public static InteractionManager Instance { get; set; }
    public Weapon hoveredWeapon = null;
    public AmmoCrate hoveredAmmoCrate = null;
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
        Ray ray = Camera.main.ViewportPointToRay(new Vector3(0.5f, 0.5f, 0));
        RaycastHit hit;

        if(Physics.Raycast(ray, out hit))
        {
            GameObject objectHitByRaycast = hit.transform.gameObject;

            if(objectHitByRaycast.GetComponent<Weapon>() && objectHitByRaycast.GetComponent<Weapon>().isActiveWeapon == false)
            {
                if(hoveredWeapon)
                {
                    HUDManager.Instance.hoveredWeaponUI.text = "";
                }

                hoveredWeapon = objectHitByRaycast.gameObject.GetComponent<Weapon>();
                HUDManager.Instance.hoveredWeaponUI.text = "Nyomja meg az E billentyût a(z) " + hoveredWeapon.name + " felvételéhez!";

                if (Input.GetKeyDown(KeyCode.E))
                {
                    WeaponManager.Instance.PickupWeapon(objectHitByRaycast.gameObject);
                }
            }
            else
            {
                HUDManager.Instance.hoveredWeaponUI.text = "";
            }

            //AmmoCrate
            if (objectHitByRaycast.GetComponent<AmmoCrate>())
            {
                if (hoveredAmmoCrate)
                {
                    HUDManager.Instance.hoveredAmmoCrateUI.text = "";
                }

                hoveredAmmoCrate = objectHitByRaycast.gameObject.GetComponent<AmmoCrate>();
                HUDManager.Instance.hoveredAmmoCrateUI.text = "Nyomja meg az E billentyût lõszer felvételhez!";

                if (Input.GetKeyDown(KeyCode.E))
                {
                    Weapon activeWeapon = WeaponManager.Instance.activeWeaponSlot.GetComponentInChildren<Weapon>();
                    activeWeapon.bulletsLeft = activeWeapon.magazineSize;
                    activeWeapon.ammoLeft = activeWeapon.magazineSize * 10;
                }
            }
            else
            {
                HUDManager.Instance.hoveredAmmoCrateUI.text = "";
            }
        }
    }
}
