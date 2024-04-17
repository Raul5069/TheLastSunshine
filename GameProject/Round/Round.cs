// Ez az osztály írja le egy egész játékidő folyamatát

class Round
{
    private List<Wave> waves;
    private int numberOfWaves;
    public Round(int numberOfWaves)
    {
        this.waves = new List<Wave>();
        this.numberOfWaves = numberOfWaves;
    }

    public List<Wave> GetWaves(){
        return waves;
    }
    public int GetNumberOfRound(){
        return numberOfWaves;
    }

    public void StartGame(){
        int zombiesHealt = 100;
        int zombiesAmount = 6;
        int waveCount = 1;

        // Ezt a ciklust neked kell jól megválasztani. Hogy lehessek kezelni a játék folyását. Ez most folyamatosan működne. Nincs benne semmi várakozás vagy hasonlók, ami a játék folyamán történnek. Tehét ide olyan feltételek kellenek, ami a játékot befolyásolják
        // while ((waveCount != numberOfWaves) || (Player.hp != 0)) Feltétlenek az kell, hogy ameddig van élete a játékosnak vagy el nem fogy a kör
        while (waveCount != numberOfWaves) // Innen csak azért hagytam ki, hogy műküdjon a kód, de neked a fenti fog kelleni
        {
            waves.Add(new Wave(zombiesAmount, zombiesHealt)); //Az első paraméter a zombik száma, második az életük
        
            //A számuk 3-al növekszik
            zombiesAmount+=3;
            // A zombik élete 5-el növekszi
            zombiesHealt+=5;
            waveCount++;
        }
    }
}