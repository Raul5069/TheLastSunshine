using System;

//Ez az osztály mutatja meg egy wave jellemzőit

//Print fibonacci numbers
class Wave
{
    private int zombieAmount;
    private int zombieHealth;

    public Wave(int zombieAmount, int zombieHealth)
    {
        this.zombieAmount = zombieAmount;
        this.zombieHealth = zombieHealth;
    }

    public void GenerateZombies(){
        //Ide fog kerülni a spawn
        // A zombieAmount változó fogja megmondani, hogy hány darabot kell lespawnolni
        Console.WriteLine(this.zombieAmount + "db zombi generálása...");
    }

    public void SetZombieHealt(){
        //Ide kell az a kód, ami a zombi életét megváltoztatja. Tehát a karakter, aki létezik a 3D-s világban, annak a hp tulajdonságát megváltoztja
        /*
        Ez csak egy példa, hogy ilyesmit kell csinálni

        z1.setHealt(this.zombieHealth)
        
        Itt a z1 az egy zombi karakter
        Ami a zárójelben van az fontos. Szóval azt majd így használd
        */
    }
}