using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.AI;

public class ZombieMove : MonoBehaviour
{
    private NavMeshAgent navAgent;
    Transform player;
    Animator animator;
    public float attackingDistance = 2.5f;

    private void Start()
    {
        navAgent = GetComponent<NavMeshAgent>();
        player = GameObject.FindGameObjectWithTag("Player").transform;
        animator = GetComponent<Animator>();
    }

    private void Update()
    {
        navAgent.SetDestination(player.position);
    }
}
