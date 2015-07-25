# CodeDeploy Pushbullet Integration

## Description
AWS CodeDeploy appspec.yml and script exmaple for sending notification before & after deployment to pushbullet.
I'm using Pushbullet for PHP (https://github.com/ivkos/Pushbullet-for-PHP)

## Requirements
* CodeDeploy Deployment Group Id
Get CodeDeploy Deployment Group Id by logging in into your server and finding the deployment group folder

> dir /opt/codedeploy-agent/deployment-root/

Usually it is GUID directory and usually there is only one, for example /opt/codedeploy-agent/deployment-root/[GUID]
* Your Pushbullet access token: https://www.pushbullet.com/account
* All other requirements from Pushbullet for PHP (https://github.com/ivkos/Pushbullet-for-PHP)

## Install
Clone the repository and alter the below files accordingly:

1. scripts/before_install replace your Deployment Group Id with [DEPLOYMENT_GROUP_ID]

2. scripts/codedeploy-pushnotification/deployment-start.php and deployment-finish.php replace your Pushbullet token with [TOKEN] 

Copy scripts folder to your root project or merge with yours script folder.

Update your appspec.yml according to the current appspec.yml.
```yml
version: 0.0
os: linux
files:
  - source: /scripts/codedeploy-pushnotification
    destination: /tmp/codedeploy-pushnotification
hooks:
  BeforeInstall:
    - location: scripts/before_install
      timeout: 300
      runas: root
  ValidateService:
    - location: scripts/validate_service
      timeout: 300
      runas: root
```

## Notification examples
![](https://github.com/niraltmark/codedeploy-pushbullet-php/blob/master/images/pushbullet-deployment-started-notification.jpg?raw=true)

![](https://github.com/niraltmark/codedeploy-pushbullet-php/blob/master/images/pushbullet-deployment-finished-notification.jpg?raw=true)
