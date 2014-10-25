Vagrant.configure("2") do |config|

  config.vm.provision :puppet do |puppet|

    puppet.manifests_path = "windmill/manifests"
    puppet.manifest_file = "default.pp"
    puppet.module_path = "windmill/modules"

    puppet.facter = {
      "mysql_dbase" => "my_database",
      "mysql_user" => "my_user",
      "mysql_pass" => "my_pass",
      "mysql_file" => ""
    }

  end

  config.vm.synced_folder ".", "/var/www/wijbe",
    create: true,
    owner: "vagrant",
    group: "www-data",
    mount_options: ["dmode=775,fmode=664"]

  config.vm.hostname = "vagrant.wijbe.com"

  config.vm.box = "ubuntu/trusty64"

  config.vm.network :forwarded_port,
    guest: 80,
    host: 8080,
    auto_correct: true

  config.vm.provider "virtualbox" do |vbox|
    vbox.memory = 1024
    vbox.cpus = 1
    vbox.customize ["modifyvm", :id, "--natdnshostresolver1", "on"]
    vbox.customize ["modifyvm", :id, "--natdnsproxy1", "on"]
  end

end
