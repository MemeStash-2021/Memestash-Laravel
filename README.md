![Memestash Laravel](./markdown/logo.png)

---

Welcome to the MemeStash Laravel Back-End. This application can be used in combination with one of the 2 Memestash clients in order to provide them with data.

## Setup
This project uses Laravel Sail in order to run. This means that Docker can be used in order to run the necessary containers

### Prerequisites
- Make sure that you're able to run docker containers. [Docker Desktop](https://www.docker.com/products/docker-desktop) is an easy-to-use client to run containers on your host machine.
- Make sure that you have [WSL 2 installed](https://docs.microsoft.com/en-us/windows/wsl/install-win10#manual-installation-steps) and [configured for Docker](https://docs.docker.com/docker-for-windows/wsl/#install)
- Make sure that the following ports aren't used by any programs on your host machine *(**Tip**: If you're not sure, you can run the following command in a Windows CLI in order to check: `netstat -ano | findstr <portnumber>`)*
    - 3306 *(This is the port used by MySQL)*
    - 6379 *(This is the port used by Redis)*
    - 7700 *(This is the port used by Meilisearch)*
    - 1025 *(This is the port used by Mailhog)*
    - 80 *(This is the port used to communicate with the server)*
- Make sure that Git is installed on your WSL distro.    
    
### Installation process
1. In your WSL Distro of choice, got to your home directory and perform the following command
    ```
    git clone git@git.ti.howest.be:TI/2020-2021/s4/web-and-mobile-technology/students/bo-robbrecht/memestash/laravel.git
    ```
    This will create a directory `laravel` in your home directory.
2. Navigate to the previously mentioned directory and perform the following command (`-d` will run the containers detached, so that you can still use your shell):
    ```
    ./vendor/bin/sail up -d
    ```
   **Note:** *You'll need to use ./vendor/bin/sail up a lot. It's might be wise to make a alias in your `.bashrc` to make life easier, like `ms-sail` or another alias of your choice.*
3. When all containers are up and running, you can perform the following command to construct & fill the database:
    ```
    ./vendor/bin/sail artisan migrate:fresh --seed
    ```
That should be it! If you're able to visit [Laravel's homepage](http://localhost) through `http://localhost`, the system is up & running. If you wish to stop the containers, you can use the following command: `./vendor/bin/sail stop`

## Frequently Asked Questions
**Q:** When trying to run the containers, I get the following error: `docker.credentials.errors.InitializationError: docker-credential-desktop.exe not installed or not available in PATH`
<br>**A:** This is a [common problem](https://github.com/docker/compose/issues/7495) within the WSL2 Integration. There are multiple fixes for this, but one that worked for me was the following:

1. `./vendor/bin/sail down` *(This removes all the existing containers)*
2. Remove Docker's config file: `rm ~/docker/config.json`
3. `./vendor/bin/sail up -d`

This will cause Docker to rebuild the `config.json` and will probably clear any problems you have. If this didn't fix it, try taking a look at this [issue](https://github.com/docker/compose/issues/7495) for more solutions
