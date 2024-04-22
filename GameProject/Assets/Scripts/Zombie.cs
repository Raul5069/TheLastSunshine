using System;
using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.AI;

public class Zombie : MonoBehaviour
{
    public ZombieHand zombieHand;
    public int zombieDamage;

    [SerializeField] private int HP = 100;
    [SerializeField] private float zombieLifeTime = 20f;
    [SerializeField] private GameObject zombiePrefab;
    private Animator animator;

    private NavMeshAgent navAgent;

    public bool isDead = false;

    private void Start()
    {
        animator = GetComponent<Animator>();
        navAgent = GetComponent<NavMeshAgent>();
        zombieHand.damage = zombieDamage;
    }

    public void TakeDamage(int damageAmount)
    {
        HP -= damageAmount;

        if(HP <= 0)
        {
            animator.SetTrigger("DIE");
            SoundManager.Instance.zombieChannel.Stop();
            SoundManager.Instance.zombieChannel.PlayOneShot(SoundManager.Instance.zombieDeath);
            GetComponentInChildren<Collider>().enabled = false;
            isDead = true;
            StartCoroutine(Disappier());
        }
        else
        {
            animator.SetTrigger("DAMAGE");
            SoundManager.Instance.zombieChannel2.PlayOneShot(SoundManager.Instance.zombieHurt);
        }
    }

    private IEnumerator Disappier()
    {
        yield return new WaitForSeconds(30f);
        Destroy(zombiePrefab);
    }
}
