<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Inisiatif\Package\User\ModelRegistrar;
use Inisiatif\Package\User\Factories\UserFactory;
use Inisiatif\Package\User\Factories\BranchFactory;
use Inisiatif\Package\User\Factories\EmployeeFactory;

final class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        $this->createUserHeadOffice();
        $this->createUserBranch();
    }

    public function createUserHeadOffice(): void
    {
        $branch = BranchFactory::new([
            'type' => 'KC',
            'name' => 'Pusat',
        ])->create();

        $employee = EmployeeFactory::new([
            'nip' => '0000001',
            'branch_id' => $branch->getKey(),
            'name' => 'User Pusat',
            'email' => 'user.pusat@izi.or.id',
        ])->create();

        UserFactory::new([
            'name' => 'User Pusat',
            'username' => 'user.pusat@izi.or.id',
            'email' => 'user.pusat@izi.or.id',
            'loginable_id' => $employee->getKey(),
            'loginable_type' => 'EMPLOYEE',
        ]);
    }

    public function createUserBranch(): void
    {
        /** @var Model $headOffice */
        $headOffice = ModelRegistrar::getBranchModel();

        $branch = BranchFactory::new([
            'type' => 'KC',
            'name' => 'DKI Jakarta',
            'is_head_office' => false,
            'parent_id' => $headOffice->newQuery()->where('is_head_office', true)->first()?->getKey(),
        ])->create();

        $employee = EmployeeFactory::new([
            'nip' => '0000002',
            'branch_id' => $branch->getKey(),
            'name' => 'User DKI Jakarta',
            'email' => 'user.jakarta@izi.or.id',
        ])->create();

        UserFactory::new([
            'name' => 'User DKI Jakarta',
            'username' => 'user.jakarta@izi.or.id',
            'email' => 'user.jakarta@izi.or.id',
            'loginable_id' => $employee->getKey(),
            'loginable_type' => 'EMPLOYEE',
        ])->create();
    }
}
