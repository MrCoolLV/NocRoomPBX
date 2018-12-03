What is [NocRoomPBX](https://nocroom.com/)?
--------------------------------------

[NocRoomPBX](https://nocroom.com/) can be used as a single or domain based multi-tenant PBX, carrier grade switch, call center server, fax server, VoIP server, voicemail server, conference server, voice application server, multi-tenant appliance framework and more. [FreeSWITCH™](http://freeswitch.org) is a highly scalable, multi-threaded, multi-platform communication platform. 

It provides the functionality your business needs and brings carrier grade switching, and corporate-level phone system features to small, medium, and large businesses. Read more at [NocRoomPBX](https://nocroom.com/). 

In addition to providing all of the usual PBX functionality, FusionPBX allows you to configure:

- Multi-Tenant
- Unlimited Extensions
- Voicemail-to-Email
- Device Provisioning
- Music on Hold
- Call Parking
- Automatic Call Distribution
- Interactive Voice Response
- Ring Groups
- Find Me / Follow Me
- Hot desking
- High Availability and Redundancy
- Dialplan Programming that allow nearly endless possibilities


Software Requirements
--------------------------------------
- NocRoomPBX will run on Debian 8, FreeBSD 10 & 11, CentOS, and more.

How to Install NocRoomPBX
----------------------------
* As root do the following:

```bash
apt-get update && apt-get upgrade && apt-get install -y git
```
```bash
cd /usr/src
```
```bash
git clone https://github.com/NocRoom/NocRoomPBX.git
```
```bash
chmod 755 -R /usr/src/nocroom-install.sh
```
```bash
cd /usr/src/nocroom-install.sh/debian
```
```bash
./install.sh
```

This install script is designed to be an fast, simple, and in a modular way to install NocRoomPBX. Start with a minimal install of Debian 8 with SSH enabled. Run the following commands under root. The script installs NocRoomPBX, FreeSWITCH release package and its dependencies, IPTables, Fail2ban, NGINX, PHP FPM and PostgreSQL.
