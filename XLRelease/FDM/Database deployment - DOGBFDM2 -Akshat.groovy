// Exported from:        http://DESKTOP-5PVJ082:5516/#/templates/Folder6b12d4ccbdfd417e9ee67485dd902686-Release959a2cfb32564d218dc6345e651e97f6/releasefile
// Release version:      9.8.0
// Date created:         Wed May 19 21:51:54 SGT 2021

xlr {
  template('Database deployment - DOGBFDM2 -Akshat') {
    folder('FDM')
    variables {
      listBoxVariable('dbuser') {
        label 'Database user to be deployed'
        description 'Please select the Environment from the drop down list'
        possibleValues 'UAT2', 'UAT4', 'UAT6', 'UAT8', 'UAT10', 'UAT12', 'UAT14', 'UAT16', 'UAT18', 'UAT20', 'UAT22', 'UAT24', 'UAT26', 'UAT28', 'UAT30', 'UAT32', 'UAT34', 'UAT36'
        value 'UAT2'
      }
      booleanVariable('database_rollback') {
        required false
        showOnReleaseStart false
        label 'Please Tick the checkbox for Rollback'
        description 'Option is used for selecting the Rollback'
      }
      stringVariable('ENVProperty') {
        required false
        label 'Parameters to be Replaced'
        description 'Environment name for which tokens will be replaced from properties file, e.g dev, uat, prod. Type NA or NotApplicable if you don\'t have any tokens to replace.'
        value 'NA'
      }
      stringVariable('Artifactory_Repo') {
        label 'Artifactory Repository'
        description 'Name of the artifactory package, e.g. eexlrelease-libs-releases-local'
      }
      stringVariable('Artifact_Path') {
        description 'Path of the artifactory package, e.g. com/rbs/xlr/example-3-db-package'
      }
      stringVariable('Artifact_Name') {
        description 'Name of the database artifact, e.g. example-3-db-package'
      }
      stringVariable('Artifact_Version') {
        description 'Version of the database artifact, e.g. 1.0.0'
      }
      booleanVariable('deploy') {
        required false
        showOnReleaseStart false
        label 'Please Tick the checkbox for deployment'
        description 'Option is used for selecting the Deployment'
      }
      setVariable('EMAIL_TO') {
        label 'Add the Email ID\'s for notification'
      }
      stringVariable('ENVIRONMENT') {
        required false
        showOnReleaseStart false
        value 'DOGBFDM2'
      }
      stringVariable('DBOUTPUT') {
        required false
        showOnReleaseStart false
      }
      stringVariable('RBOUTPUT') {
        required false
        showOnReleaseStart false
      }
      booleanVariable('POST_CHECKS') {
        required false
        showOnReleaseStart false
        label 'Please Select if the Post checks are Completed and Task can be closed'
      }
    }
    description 'Template used for database Deployments on DOGBFDM2'
    scheduledStartDate Date.parse("yyyy-MM-dd'T'HH:mm:ssZ", '2020-08-13T11:30:00+0800')
    dueDate Date.parse("yyyy-MM-dd'T'HH:mm:ssZ", '2021-04-30T18:36:28+0800')
    scriptUsername 'service-ftuatadm'
    phases {
      phase('DOGBFDM2') {
        color '#0079BC'
        tasks {
          userInput('Deployment or Rollback') {
            description 'Please take action for Deployment or Rollback or both?'
            team 'Dev'
            variables {
              variable 'database_rollback'
              variable 'deploy'
            }
          }
          custom('Database Deployment') {
            precondition 'releaseVariables["deploy"] == True'
            failureHandler 'set releaseVariables[\'deploy_status\']="Failed"'
            taskFailureHandlerEnabled true
            taskRecoverOp com.xebialabs.xlrelease.domain.recover.TaskRecoverOp.RUN_SCRIPT
            script {
              type 'databasePlugin.Oracle'
              artifactory_url 'https://artifactory.server.rbsgrp.net/artifactory'
              artifactory_repo '${Artifactory_Repo}'
              artifact_path '${Artifact_Path}'
              artifact_name '${Artifact_Name}'
              artifact_version '${Artifact_Version}'
              property_env '${ENVProperty}'
              db_user 'fdm_arm_adm[FDM_${dbuser}]'
              db_password variable('folder.dbpassword-dogbfdm2')
              db_host 'lonuc35202.fm.rbsgrp.net'
              db_port '1532'
              database_name 'DOGBFDM2'
              output variable('DBOUTPUT')
            }
          }
          script('SET EMAIL ID\'s') {
            precondition 'releaseVariables["deploy"] == True'
            script (['''\
CurrentReleaseID = getCurrentRelease().getId()
phase=getCurrentPhase()
phaseID=phase.getId()
task=getCurrentTask()
taskID=task.getId()

def NextTask(task):
  index = 0
  for item in phase.tasks:
    print str(index)+" "+ item.title
    if item.id == task.id:
      break
    index += 1
  return task.getPhase().tasks[index+1]
  
next_task=NextTask(task)

print "Next task is: " + str(next_task.title)
print str(next_task.getId())

notification = taskApi.getTask(next_task.getId())
notification.addresses = ${EMAIL_TO}
taskApi.updateTask(notification)
'''])
          }
          notification('Email Notification') {
            precondition 'releaseVariables["deploy"] == True'
            subject 'Deployment Completed for the Release - ${release.title} on FDM_${dbuser}'
            body 'Deployment Completed for the Release -${release.title} with the version -${Artifact_Version} on FDM_${dbuser}\n' +
            '\n' +
            'For More Information Please check - ${release.url} \n' +
            '\n' +
            'Deployment done by - ${release.owner}\n' +
            '\n' +
            'Logs: \n' +
            '${DBOUTPUT}'
            replyTo 'EnterpriseSolutionsReleaseManagement@rbs.com'
            priority com.xebialabs.xlrelease.domain.notification.MailPriority.Normal
          }
          userInput('Rollback') {
            description 'Please take action if Rollback required'
            team 'Dev'
            precondition 'releaseVariables["database_rollback"] == False'
            variables {
              variable 'database_rollback'
            }
          }
          custom('Rollback Deployment') {
            precondition 'releaseVariables["database_rollback"] == True'
            failureHandler 'set releaseVariables[\'deploy_status\']="Failed"'
            taskRecoverOp com.xebialabs.xlrelease.domain.recover.TaskRecoverOp.RUN_SCRIPT
            script {
              type 'databasePlugin.Oracle'
              artifactory_url 'https://artifactory.server.rbsgrp.net/artifactory'
              artifactory_repo '${Artifactory_Repo}'
              artifact_path '${Artifact_Path}'
              artifact_name '${Artifact_Name}'
              artifact_version '${Artifact_Version}'
              property_env '${ENVProperty}'
              db_user 'fdm_arm_adm[FDM_${dbuser}]'
              db_password variable('folder.dbpassword-dogbfdm2')
              db_host 'lonuc35202.fm.rbsgrp.net'
              db_port '1532'
              database_name 'DOGBFDM2'
              rollback variable('database_rollback')
              output variable('RBOUTPUT')
            }
          }
          script('SET EMAIL ID\'s - Rollback') {
            precondition 'releaseVariables["database_rollback"] == True'
            script (['''\
CurrentReleaseID = getCurrentRelease().getId()
phase=getCurrentPhase()
phaseID=phase.getId()
task=getCurrentTask()
taskID=task.getId()

def NextTask(task):
  index = 0
  for item in phase.tasks:
    print str(index)+" "+ item.title
    if item.id == task.id:
      break
    index += 1
  return task.getPhase().tasks[index+1]
  
next_task=NextTask(task)

print "Next task is: " + str(next_task.title)
print str(next_task.getId())

notification = taskApi.getTask(next_task.getId())
notification.addresses = ${EMAIL_TO}
taskApi.updateTask(notification)
'''])
          }
          notification('Email Notification - Rollback') {
            precondition 'releaseVariables["database_rollback"] == True'
            subject 'Rollback Completed for the Release - ${release.title} - on FDM_${dbuser}'
            body 'Rollback Completed for the Release -${release.title} with the version -${Artifact_Version} on FDM_${dbuser}\n' +
            '\n' +
            'For More Information Please check - ${release.url} \n' +
            '\n' +
            'Deployment done by - ${release.owner}\n' +
            '\n' +
            'Logs: \n' +
            '${RBOUTPUT}'
            replyTo 'EnterpriseSolutionsReleaseManagement@rbs.com'
            priority com.xebialabs.xlrelease.domain.notification.MailPriority.Normal
          }
          userInput('Post checks') {
            description 'Post Deployment Checks\n' +
            '\n' +
            'For Redeploy - Please choose Restart Phase and continue with any stage of Deployment\n' +
            '\n' +
            'Note: Once the Post Checks are marked as completed the entire Release will be closed'
            variables {
              variable 'POST_CHECKS'
            }
          }
        }
      }
      phase('New Phase') {
        tasks {
          manual('tes') {
            
          }
        }
      }
    }
    
  }
}