<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Hyn\Tenancy\Contracts\Repositories\CustomerRepository;
use Hyn\Tenancy\Contracts\Repositories\HostnameRepository;
use Hyn\Tenancy\Contracts\Repositories\WebsiteRepository;
//use Hyn\Tenancy\Models\Customer;
use Hyn\Tenancy\Models\Hostname;
use Hyn\Tenancy\Models\Website;

class AdminTenants extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customers = [
            ['database' => 'bsp_intl_admin', 'domain' => 'admin.intlcaht.com', 'name' => 'BSP Admin', 'email' => 'info@intlcaht.com'],
        ];

        foreach ($customers as $customer) {
            /*
            |--------------------------------------------------------------------------
            | CREATE THE WEBSITE
            |--------------------------------------------------------------------------
             */
            $website = new Website(['uuid' => $customer['database']]);
            app(WebsiteRepository::class)->create($website);

            /*
            |--------------------------------------------------------------------------
            | CREATE THE HOSTNAME
            |--------------------------------------------------------------------------
             */
            $hostname = new Hostname(['fqdn' => $customer['domain']]);
            app(HostnameRepository::class)->attach($hostname, $website);

            /*
            |--------------------------------------------------------------------------
            | CREATE THE CUSTOMER
            |--------------------------------------------------------------------------
             */
            // $customer = new Customer(['name' => $customer['name'], 'email' => $customer['email']]);
            // app(CustomerRepository::class)->create($customer);

            // /*
            // |--------------------------------------------------------------------------
            // | SAVE THE CUSTOMER WITH HIS HOSTNAME AND WEBSITE
            // |--------------------------------------------------------------------------
            //  */
            // $hostname->customer()->associate($customer)->save();
            // $website->customer()->associate($customer)->save();
        }
    }
}
