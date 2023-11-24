VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
    # General Vagrant VM configuration
    # config.vm.box = "geerlingguy/centos8"
    config.vm.box = "geerlingguy/ubuntu2004"
    # disable the automatic insertion of SSH keys into the virtual machine.
    config.ssh.insert_key = false
    config.vm.synced_folder ".", "/vagrant", disabled: true
    config.vm.provider :virtualbox do |v|
        v.memory = 512
    end

    # Application Server 1
    config.vm.define "app1" do |app|
        app.vm.hostname = "app1"
        app.vm.synced_folder ".", "/vagrant", disabled: true
        app.vm.network :private_network, ip: "192.168.56.4"
    end

    # Application Server 2
    config.vm.define "app2" do |app|
        app.vm.hostname = "app2"
        app.vm.synced_folder ".", "/vagrant", disabled: true
        app.vm.network :private_network, ip: "192.168.56.5"
    end

    # Database server
    config.vm.define "db" do |db|
        db.vm.hostname = "orc-db.test"
        db.vm.synced_folder ".", "/vagrant", disabled: true
        db.vm.network :private_network, ip: "192.168.56.6"
    end

    # Controller Server 1, for windows w/o wls2 use
    config.vm.define "main" do |app|
        app.vm.box = "geerlingguy/ubuntu2004"
        app.ssh.insert_key = false
        app.vm.provider :virtualbox do |v|
            v.memory = 512
            # create a master VM before creating the linked clones
            v.linked_clone = false
        end
        app.vm.hostname = "orc-main"
        app.vm.synced_folder ".", "/vagrant", disabled: false
        app.vm.network :private_network, ip: "192.168.56.3"     
        app.vm.provision "shell", inline: <<-SHELL
            apt install ansible -y
            cp /vagrant/* .
            # ls -lah /home/vagrant/.ssh/
            ssh-keygen -t rsa -b 4096 -N '' -f ~/.ssh/id_rsa
            # # to use the 'ssh' connection type with passwords
            # # apt upgrade -y
            apt install sshpass -y
        SHELL
    end
end