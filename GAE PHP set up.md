# GAE and PHP on Windows 10

I could get it to work on WSL.  All the components would install but nothing was delivered.  So the plan is to try an install on Windows.  This is the current state of the gcloud components on my Windows 10.

	C:\>gcloud components list
	Your current Cloud SDK version is: 223.0.0
	The latest available version is: 224.0.0
	+----------------------------------------------------------------------------------------------------------------+
	|                                                   Components                                                   |
	+------------------+------------------------------------------------------+--------------------------+-----------+
	|      Status      |                         Name                         |            ID            |    Size   |
	+------------------+------------------------------------------------------+--------------------------+-----------+
	| Update Available | Cloud SDK Core Libraries                             | core                     |   8.8 MiB |
	| Update Available | gcloud app Python Extensions                         | app-engine-python        |   6.2 MiB |
	| Not Installed    | App Engine Go Extensions                             | app-engine-go            |  56.9 MiB |
	| Not Installed    | Cloud Bigtable Command Line Tool                     | cbt                      |   6.2 MiB |
	| Not Installed    | Cloud Bigtable Emulator                              | bigtable                 |   4.2 MiB |
	| Not Installed    | Cloud Datalab Command Line Tool                      | datalab                  |   < 1 MiB |
	| Not Installed    | Cloud Datastore Emulator (Legacy)                    | gcd-emulator             |  38.1 MiB |
	| Not Installed    | Cloud Pub/Sub Emulator                               | pubsub-emulator          |  33.4 MiB |
	| Not Installed    | Cloud SQL Proxy                                      | cloud_sql_proxy          |   3.5 MiB |
	| Not Installed    | Emulator Reverse Proxy                               | emulator-reverse-proxy   |  14.5 MiB |
	| Not Installed    | Google Container Registry's Docker credential helper | docker-credential-gcr    |   1.8 MiB |
	| Not Installed    | gcloud Alpha Commands                                | alpha                    |   < 1 MiB |
	| Not Installed    | gcloud Beta Commands                                 | beta                     |   < 1 MiB |
	| Not Installed    | gcloud app Java Extensions                           | app-engine-java          | 108.8 MiB |
	| Not Installed    | gcloud app PHP Extensions                            | app-engine-php           |  19.1 MiB |
	| Not Installed    | gcloud app Python Extensions (Extra Libraries)       | app-engine-python-extras |  28.5 MiB |
	| Not Installed    | kubectl                                              | kubectl                  |   < 1 MiB |
	| Installed        | BigQuery Command Line Tool                           | bq                       |   < 1 MiB |
	| Installed        | Cloud Datastore Emulator                             | cloud-datastore-emulator |  17.7 MiB |
	| Installed        | Cloud Storage Command Line Tool                      | gsutil                   |   3.5 MiB |
	+------------------+------------------------------------------------------+--------------------------+-----------+
	
Python 2.7 is installed but not Python 3 because you need Python 2.7 to run the Python 3 stuff.  Seems a bit half arsed to me.

The PHP version on 

	choco install php --version 7.2.10
	
	
	
Make sure that the extensions are compatible with default version of PHP and are VC9 and non-thread-safe (nts) compatible.




<https://colonel-white.scm.azurewebsites.net/>

