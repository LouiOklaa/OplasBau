<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [

            'Armaturenbrett',
            'Statistiken',

            'AllgemeineInformationen',
            'AllgemeineInformationenBearbeiten',

            'Dienste',
            'DiensteHinzufügen',
            'DiensteBearbeiten',
            'DiensteLöschen',

            'Galerie',
            'InGalerieHinzufügen',
            'InGalerieBearbeiten',
            'InGalerieLöschen',

            'Kategorien',
            'KategorienHinzufügen',
            'KategorienBearbeite',
            'KategorienLöschen',

            'Einstellungen',
            'Benutzer',
            'BenutzerHinzufügen',
            'BenutzerBearbeiten',
            'BenutzerLöschen',
            'ProfilAnzeigen',
            'AlleProfileAnzeigen',
            'BenutzerRollen',
            'RollenHinzufügen',
            'RollenBearbeiten',
            'RollenLöschen',
            'RollenAnzeigen',
            'AlleRollenAnzeigen',

            'AlleNachrichtenAnzeigen',
            'Nachricht',
            'NachrichtSenden',

            'Dokumentation',

        ];


        foreach ($permissions as $permission) {

            Permission::create(['name' => $permission]);
        }
    }
}
