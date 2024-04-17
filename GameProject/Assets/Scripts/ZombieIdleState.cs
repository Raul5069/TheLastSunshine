using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class ZombieIdleState : StateMachineBehaviour
{
    override public void OnStateEnter(Animator animator, AnimatorStateInfo stateInfo, int layerIndex)
    {
        
    }

    override public void OnStateUpdate(Animator animator, AnimatorStateInfo stateInfo, int layerIndex)
    {
        animator.SetBool("isRunning", true);
    }
}