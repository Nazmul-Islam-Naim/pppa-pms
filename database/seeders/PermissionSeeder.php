<?php

namespace Database\Seeders;

use App\Models\Module;
use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // Role management
         $moduleAppRole = Module::updateOrCreate(['title' => 'Role Management', 'slug'=>Str::slug('Role Management')]);
         Permission::updateOrCreate([
             'module_id' => $moduleAppRole->id,
             'title' => 'Access Roles',
             'slug' => 'app.roles.index',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleAppRole->id,
             'title' => 'Create Role',
             'slug' => 'app.roles.create',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleAppRole->id,
             'title' => 'Edit Role',
             'slug' => 'app.roles.edit',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleAppRole->id,
             'title' => 'Delete Role',
             'slug' => 'app.roles.destroy',
         ]);


         // User management
         $moduleAppUser = Module::updateOrCreate(['title' => 'User Management', 'slug'=>Str::slug('User Management')]);
         Permission::updateOrCreate([
             'module_id' => $moduleAppUser->id,
             'title' => 'Access User',
             'slug' => 'app.users.index',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleAppUser->id,
             'title' => 'Create User',
             'slug' => 'app.users.create',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleAppUser->id,
             'title' => 'Edit User',
             'slug' => 'app.users.edit',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleAppUser->id,
             'title' => 'Delete User',
             'slug' => 'app.users.destroy',
         ]);
         // department management
         $moduleAppDepartment = Module::updateOrCreate(['title' => 'Department Management', 'slug'=>Str::slug('Department Management')]);
         Permission::updateOrCreate([
             'module_id' => $moduleAppDepartment->id,
             'title' => 'Access Department',
             'slug' => 'app.departments.index',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleAppDepartment->id,
             'title' => 'Create Department',
             'slug' => 'app.departments.create',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleAppDepartment->id,
             'title' => 'Edit Department',
             'slug' => 'app.departments.edit',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleAppDepartment->id,
             'title' => 'Delete Department',
             'slug' => 'app.departments.destroy',
         ]);
         // designation management
         $moduleAppDesignation = Module::updateOrCreate(['title' => 'Designation Management', 'slug'=>Str::slug('Designation Management')]);
         Permission::updateOrCreate([
             'module_id' => $moduleAppDesignation->id,
             'title' => 'Access Designation',
             'slug' => 'app.designations.index',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleAppDesignation->id,
             'title' => 'Create Designation',
             'slug' => 'app.designations.create',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleAppDesignation->id,
             'title' => 'Edit Designation',
             'slug' => 'app.designations.edit',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleAppDesignation->id,
             'title' => 'Delete Designation',
             'slug' => 'app.designations.destroy',
         ]);
         // account type management
         $moduleAppAccountType = Module::updateOrCreate(['title' => 'Account Type Management', 'slug'=>Str::slug('Account Type Management')]);
         Permission::updateOrCreate([
             'module_id' => $moduleAppAccountType->id,
             'title' => 'Access Account Type',
             'slug' => 'app.accounttype.index',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleAppAccountType->id,
             'title' => 'Create Account Type',
             'slug' => 'app.accounttype.create',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleAppAccountType->id,
             'title' => 'Edit Account Type',
             'slug' => 'app.accounttype.edit',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleAppAccountType->id,
             'title' => 'Delete Account Type',
             'slug' => 'app.accounttype.destroy',
         ]);
         // bank account management
         $moduleAppBankAccount = Module::updateOrCreate(['title' => 'Bank Account Management', 'slug'=>Str::slug('Bank Account Management')]);
         Permission::updateOrCreate([
             'module_id' => $moduleAppBankAccount->id,
             'title' => 'Access Bank Account',
             'slug' => 'app.bankaccount.index',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleAppBankAccount->id,
             'title' => 'Create Bank Account',
             'slug' => 'app.bankaccount.create',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleAppBankAccount->id,
             'title' => 'Edit Bank Account',
             'slug' => 'app.bankaccount.edit',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleAppBankAccount->id,
             'title' => 'Delete Bank Account',
             'slug' => 'app.bankaccount.destroy',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleAppBankAccount->id,
             'title' => 'Bank Deposit',
             'slug' => 'app.bankaccount.deposit',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleAppBankAccount->id,
             'title' => 'Bank Withdraw',
             'slug' => 'app.bankaccount.withdraw',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleAppBankAccount->id,
             'title' => 'Bank Transfer',
             'slug' => 'app.bankaccount.transfer',
         ]);
         // cheque book management
         $moduleAppChequeBook = Module::updateOrCreate(['title' => 'Cheque Book Management', 'slug'=>Str::slug('Cheque Book Management')]);
         Permission::updateOrCreate([
             'module_id' => $moduleAppChequeBook->id,
             'title' => 'Access Cheque Book',
             'slug' => 'app.chequebook.index',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleAppChequeBook->id,
             'title' => 'Create Cheque Book',
             'slug' => 'app.chequebook.create',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleAppChequeBook->id,
             'title' => 'Edit Cheque Book',
             'slug' => 'app.chequebook.edit',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleAppChequeBook->id,
             'title' => 'Delete Cheque Book',
             'slug' => 'app.chequebook.destroy',
         ]);
         // ---------------- cheque number management -------------------------//
         $moduleAppChequeNumber = Module::updateOrCreate(['title' => 'Cheque Number Management', 'slug'=>Str::slug('Cheque Number Management')]);
         Permission::updateOrCreate([
             'module_id' => $moduleAppChequeNumber->id,
             'title' => 'Access Cheque Number',
             'slug' => 'app.chequenumber.index',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleAppChequeNumber->id,
             'title' => 'Create Cheque Number',
             'slug' => 'app.chequenumber.create',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleAppChequeNumber->id,
             'title' => 'Edit Cheque Number',
             'slug' => 'app.chequenumber.edit',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleAppChequeNumber->id,
             'title' => 'Delete Cheque Number',
             'slug' => 'app.chequenumber.destroy',
         ]);
         // ---------------- Expense Code  management -------------------------//
         $moduleExpenseCode = Module::updateOrCreate(['title' => 'Expense Code', 'slug'=>Str::slug('Expense Code')]);
         Permission::updateOrCreate([
             'module_id' => $moduleExpenseCode->id,
             'title' => 'Access Expense Code',
             'slug' => 'app.expenseCode.index',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleExpenseCode->id,
             'title' => 'Create Expense Code',
             'slug' => 'app.expenseCode.create',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleExpenseCode->id,
             'title' => 'Edit Expense Code',
             'slug' => 'app.expenseCode.edit',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleExpenseCode->id,
             'title' => 'Delete Expense Code',
             'slug' => 'app.expenseCode.destroy',
         ]);
         // ---------------- Expense Title  management -------------------------//
         $moduleExpenseTitle = Module::updateOrCreate(['title' => 'Expense Title', 'slug'=>Str::slug('Expense Title')]);
         Permission::updateOrCreate([
             'module_id' => $moduleExpenseTitle->id,
             'title' => 'Access Expense Title',
             'slug' => 'app.expenseTitle.index',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleExpenseTitle->id,
             'title' => 'Create Expense Title',
             'slug' => 'app.expenseTitle.create',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleExpenseTitle->id,
             'title' => 'Edit Expense Title',
             'slug' => 'app.expenseTitle.edit',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleExpenseTitle->id,
             'title' => 'Delete Expense Title',
             'slug' => 'app.expenseTitle.destroy',
         ]);
         // ---------------- Add Expense  management -------------------------//
         $moduleAddExpense = Module::updateOrCreate(['title' => 'Add Expense', 'slug'=>Str::slug('Add Expense')]);
         Permission::updateOrCreate([
             'module_id' => $moduleAddExpense->id,
             'title' => 'Add Expense',
             'slug' => 'app.addExpense.create',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleAddExpense->id,
             'title' => 'Expense Report',
             'slug' => 'app.addExpense.report',
         ]);
         // ---------------- Sector management -------------------------//
         $moduleSector = Module::updateOrCreate(['title' => 'Sector Management', 'slug'=>Str::slug('Sector Management')]);
         Permission::updateOrCreate([
             'module_id' => $moduleSector->id,
             'title' => 'Access Sector',
             'slug' => 'app.sector.index',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleSector->id,
             'title' => 'Create Sector',
             'slug' => 'app.sector.create',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleSector->id,
             'title' => 'Edit Sector',
             'slug' => 'app.sector.edit',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleSector->id,
             'title' => 'Delete Sector',
             'slug' => 'app.sector.destroy',
         ]);
         // ---------------- ministry management -------------------------//
         $moduleMinistry = Module::updateOrCreate(['title' => 'Ministry Management', 'slug'=>Str::slug('Ministry Management')]);
         Permission::updateOrCreate([
             'module_id' => $moduleMinistry->id,
             'title' => 'Access Ministry',
             'slug' => 'app.ministry.index',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleMinistry->id,
             'title' => 'Create Ministry',
             'slug' => 'app.ministry.create',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleMinistry->id,
             'title' => 'Edit Ministry',
             'slug' => 'app.ministry.edit',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleMinistry->id,
             'title' => 'Delete Product Category',
             'slug' => 'app.ministry.destroy',
         ]);
         // ---------------- implementing agency management -------------------------//
         $moduleAgency = Module::updateOrCreate(['title' => 'Implementing Agency Management', 'slug'=>Str::slug('Implementing Agency Management')]);
         Permission::updateOrCreate([
             'module_id' => $moduleAgency->id,
             'title' => 'Access Implementing Agency',
             'slug' => 'app.agency.index',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleAgency->id,
             'title' => 'Create Implementing Agency',
             'slug' => 'app.agency.create',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleAgency->id,
             'title' => 'Edit Implementing Agency',
             'slug' => 'app.agency.edit',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleAgency->id,
             'title' => 'Delete Implementing Agency',
             'slug' => 'app.agency.destroy',
         ]);
         // ---------------- location management -------------------------//
         $moduleLocation = Module::updateOrCreate(['title' => 'Location Management', 'slug'=>Str::slug('Location Management')]);
         Permission::updateOrCreate([
             'module_id' => $moduleLocation->id,
             'title' => 'Access Location',
             'slug' => 'app.location.index',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleLocation->id,
             'title' => 'Create Location',
             'slug' => 'app.location.create',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleLocation->id,
             'title' => 'Edit Location',
             'slug' => 'app.location.edit',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleLocation->id,
             'title' => 'Delete Location',
             'slug' => 'app.location.destroy',
         ]);
         // ---------------- approval management -------------------------//
         $moduleApproval = Module::updateOrCreate(['title' => 'Approval Management', 'slug'=>Str::slug('Approval Management')]);
         Permission::updateOrCreate([
             'module_id' => $moduleApproval->id,
             'title' => 'Access Approval',
             'slug' => 'app.approval.index',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleApproval->id,
             'title' => 'Create Approval',
             'slug' => 'app.approval.create',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleApproval->id,
             'title' => 'Edit Approval',
             'slug' => 'app.approval.edit',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleApproval->id,
             'title' => 'Delete Approval',
             'slug' => 'app.approval.destroy',
         ]);
         // ---------------- private partner management -------------------------//
         $modulePrivatePartner = Module::updateOrCreate(['title' => 'Private Partner Management', 'slug'=>Str::slug('Private Partner Management')]);
         Permission::updateOrCreate([
             'module_id' => $modulePrivatePartner->id,
             'title' => 'Access Private Partner',
             'slug' => 'app.privatePartner.index',
         ]);
         Permission::updateOrCreate([
             'module_id' => $modulePrivatePartner->id,
             'title' => 'Create Private Partner',
             'slug' => 'app.privatePartner.create',
         ]);
         Permission::updateOrCreate([
             'module_id' => $modulePrivatePartner->id,
             'title' => 'Edit Private Partner',
             'slug' => 'app.privatePartner.edit',
         ]);
         Permission::updateOrCreate([
             'module_id' => $modulePrivatePartner->id,
             'title' => 'Delete Private Partner',
             'slug' => 'app.privatePartner.destroy',
         ]);
         // ---------------- delivery model management -------------------------//
         $moduleDeliveryModel = Module::updateOrCreate(['title' => 'Delivery Module', 'slug'=>Str::slug('Delivery Module')]);
         Permission::updateOrCreate([
             'module_id' => $moduleDeliveryModel->id,
             'title' => 'Access Delivery Module',
             'slug' => 'app.deliveryModel.index',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleDeliveryModel->id,
             'title' => 'Create Delivery Module',
             'slug' => 'app.deliveryModel.create',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleDeliveryModel->id,
             'title' => 'Edit Delivery Module',
             'slug' => 'app.deliveryModel.edit',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleDeliveryModel->id,
             'title' => 'Delete Delivery Module',
             'slug' => 'app.deliveryModel.destroy',
         ]);
         // ---------------- Revenue Model management -------------------------//
         $moduleRevenueModel = Module::updateOrCreate(['title' => 'Revenue Model', 'slug'=>Str::slug('Revenue Model')]);
         Permission::updateOrCreate([
             'module_id' => $moduleRevenueModel->id,
             'title' => 'Access Revenue Model',
             'slug' => 'app.revenueModel.index',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleRevenueModel->id,
             'title' => 'Create Revenue Model',
             'slug' => 'app.revenueModel.create',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleRevenueModel->id,
             'title' => 'Edit Revenue Model',
             'slug' => 'app.revenueModel.edit',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleRevenueModel->id,
             'title' => 'Delete Revenue Model',
             'slug' => 'app.revenueModel.destroy',
         ]);
         // ---------------- Glossary management -------------------------//
         $moduleGlossary = Module::updateOrCreate(['title' => 'Glossary', 'slug'=>Str::slug('Glossary')]);
         Permission::updateOrCreate([
             'module_id' => $moduleGlossary->id,
             'title' => 'Access Glossary',
             'slug' => 'app.glossary.index',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleGlossary->id,
             'title' => 'Create Glossary',
             'slug' => 'app.glossary.create',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleGlossary->id,
             'title' => 'Edit Glossary',
             'slug' => 'app.glossary.edit',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleGlossary->id,
             'title' => 'Delete Glossary',
             'slug' => 'app.glossary.destroy',
         ]);
         // ---------------- Faq management -------------------------//
         $moduleFaq = Module::updateOrCreate(['title' => 'Faq', 'slug'=>Str::slug('Faq')]);
         Permission::updateOrCreate([
             'module_id' => $moduleFaq->id,
             'title' => 'Access Faq',
             'slug' => 'app.faq.index',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleFaq->id,
             'title' => 'Create Faq',
             'slug' => 'app.faq.create',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleFaq->id,
             'title' => 'Edit Faq',
             'slug' => 'app.faq.edit',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleFaq->id,
             'title' => 'Delete Faq',
             'slug' => 'app.faq.destroy',
         ]);
         // ---------------- project management -------------------------//
         $moduleProject = Module::updateOrCreate(['title' => 'Project Management', 'slug'=>Str::slug('Project Management')]);
         Permission::updateOrCreate([
             'module_id' => $moduleProject->id,
             'title' => 'Access Project',
             'slug' => 'app.project.index',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleProject->id,
             'title' => 'Create Project',
             'slug' => 'app.project.create',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleProject->id,
             'title' => 'Edit Project',
             'slug' => 'app.project.edit',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleProject->id,
             'title' => 'Delete Project',
             'slug' => 'app.project.destroy',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleProject->id,
             'title' => 'Project Status',
             'slug' => 'app.project.status',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleProject->id,
             'title' => 'Project Report',
             'slug' => 'app.project.report',
         ]);
         
         // ---------------- feasibility company management -------------------------//
         $moduleFeasibilityCompany = Module::updateOrCreate(['title' => 'Feasibility Company Management', 'slug'=>Str::slug('Feasibility Company Management')]);
         Permission::updateOrCreate([
             'module_id' => $moduleFeasibilityCompany->id,
             'title' => 'Access Feasibility Company',
             'slug' => 'app.feasibilityCompany.index',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleFeasibilityCompany->id,
             'title' => 'Create Feasibility Company',
             'slug' => 'app.feasibilityCompany.create',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleFeasibilityCompany->id,
             'title' => 'Edit Feasibility Company',
             'slug' => 'app.feasibilityCompany.edit',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleFeasibilityCompany->id,
             'title' => 'Delete Feasibility Company',
             'slug' => 'app.feasibilityCompany.destroy',
         ]);
         
         // ---------------- Feasibility management -------------------------//
         $moduleFeasibility = Module::updateOrCreate(['title' => 'Feasibility Management', 'slug'=>Str::slug('Feasibility Management')]);
         Permission::updateOrCreate([
            'module_id' => $moduleFeasibility->id,
            'title' => 'Access Feasibility',
            'slug' => 'app.feasibility.index',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleFeasibility->id,
            'title' => 'Create Feasibility',
            'slug' => 'app.feasibility.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleFeasibility->id,
            'title' => 'Edit Feasibility',
            'slug' => 'app.feasibility.edit',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleFeasibility->id,
            'title' => 'Delete Feasibility',
            'slug' => 'app.feasibility.destroy',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleFeasibility->id,
            'title' => 'Feasibility Amendment',
            'slug' => 'app.feasibility.amendment',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleFeasibility->id,
            'title' => 'Feasibility Report',
            'slug' => 'app.feasibility.report',
        ]);

         // ---------------- construction agency management -------------------------//
         $moduleConstructionAgency = Module::updateOrCreate(['title' => 'Constraction Agency Management', 'slug'=>Str::slug('Constraction Agency Management')]);
         Permission::updateOrCreate([
             'module_id' => $moduleConstructionAgency->id,
             'title' => 'Access Constraction Agency',
             'slug' => 'app.constructionAgency.index',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleConstructionAgency->id,
             'title' => 'Create Constraction Agency',
             'slug' => 'app.constructionAgency.create',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleConstructionAgency->id,
             'title' => 'Edit Constraction Agency',
             'slug' => 'app.constructionAgency.edit',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleConstructionAgency->id,
             'title' => 'Delete Constraction Agency',
             'slug' => 'app.constructionAgency.destroy',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleConstructionAgency->id,
             'title' => 'Constraction Agency Report',
             'slug' => 'app.constructionAgency.report',
         ]);

         // ---------------- Estimated Capital cost management -------------------------//
         $moduleCostCapital = Module::updateOrCreate(['title' => 'Cost Capital Management', 'slug'=>Str::slug('Cost Capital Management')]);
         Permission::updateOrCreate([
             'module_id' => $moduleCostCapital->id,
             'title' => 'Access Cost Capital',
             'slug' => 'app.costCapital.index',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleCostCapital->id,
             'title' => 'Create Cost Capital',
             'slug' => 'app.costCapital.create',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleCostCapital->id,
             'title' => 'Edit Cost Capital',
             'slug' => 'app.costCapital.edit',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleCostCapital->id,
             'title' => 'Delete Cost Capital',
             'slug' => 'app.costCapital.destroy',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleCostCapital->id,
             'title' => 'Cost Capital Report',
             'slug' => 'app.costCapital.report',
         ]);
         // ---------------- phase management -------------------------//
         $modulePhase = Module::updateOrCreate(['title' => 'Phase Management', 'slug'=>Str::slug('Phase Management')]);
         Permission::updateOrCreate([
             'module_id' => $modulePhase->id,
             'title' => 'Access Phase',
             'slug' => 'app.phase.index',
         ]);
         Permission::updateOrCreate([
             'module_id' => $modulePhase->id,
             'title' => 'Create Phase',
             'slug' => 'app.phase.create',
         ]);
         Permission::updateOrCreate([
             'module_id' => $modulePhase->id,
             'title' => 'Edit Phase',
             'slug' => 'app.phase.edit',
         ]);
         Permission::updateOrCreate([
             'module_id' => $modulePhase->id,
             'title' => 'Delete Phase',
             'slug' => 'app.phase.destroy',
         ]);
         Permission::updateOrCreate([
             'module_id' => $modulePhase->id,
             'title' => 'Phase Amendment',
             'slug' => 'app.phase.amendment',
         ]);
         Permission::updateOrCreate([
             'module_id' => $modulePhase->id,
             'title' => 'Phase Report',
             'slug' => 'app.phase.report',
         ]);

         // ---------------- phase follow up management -------------------------//
         $modulePhaseFollowUp = Module::updateOrCreate(['title' => 'Phase Follow Up Management', 'slug'=>Str::slug('Phase Follow Up Management')]);
         Permission::updateOrCreate([
             'module_id' => $modulePhaseFollowUp->id,
             'title' => 'Access Phase Follow Up',
             'slug' => 'app.phaseFollowUp.index',
         ]);
         Permission::updateOrCreate([
             'module_id' => $modulePhaseFollowUp->id,
             'title' => 'Create Phase Follow Up',
             'slug' => 'app.phaseFollowUp.create',
         ]);
         Permission::updateOrCreate([
             'module_id' => $modulePhaseFollowUp->id,
             'title' => 'Edit Phase Follow Up',
             'slug' => 'app.phaseFollowUp.edit',
         ]);
         Permission::updateOrCreate([
             'module_id' => $modulePhaseFollowUp->id,
             'title' => 'Delete Phase Follow Up',
             'slug' => 'app.phaseFollowUp.destroy',
         ]);
         Permission::updateOrCreate([
             'module_id' => $modulePhaseFollowUp->id,
             'title' => 'Phase Follow Up Amendment',
             'slug' => 'app.phaseFollowUp.amendment',
         ]);
         Permission::updateOrCreate([
             'module_id' => $modulePhaseFollowUp->id,
             'title' => 'Phase Follow Up Report',
             'slug' => 'app.phaseFollowUp.report',
         ]);

         // ---------------- Procurement Details management -------------------------//
         $moduleProcurement = Module::updateOrCreate(['title' => 'Procurement Details', 'slug'=>Str::slug('Procurement Details')]);
         Permission::updateOrCreate([
             'module_id' => $moduleProcurement->id,
             'title' => 'Access Procurement Details',
             'slug' => 'app.procurementDetails.index',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleProcurement->id,
             'title' => 'Create Procurement Details',
             'slug' => 'app.procurementDetails.create',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleProcurement->id,
             'title' => 'Edit Procurement Details',
             'slug' => 'app.procurementDetails.edit',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleProcurement->id,
             'title' => 'Delete Procurement Details',
             'slug' => 'app.procurementDetails.destroy',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleProcurement->id,
             'title' => 'Access Country',
             'slug' => 'app.country.index',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleProcurement->id,
             'title' => 'Create Country',
             'slug' => 'app.country.create',
         ]);

         // ---------------- others document management -------------------------//
         $moduleOthersDocument = Module::updateOrCreate(['title' => 'Others Document Management', 'slug'=>Str::slug('Others Document Management')]);
         Permission::updateOrCreate([
             'module_id' => $moduleOthersDocument->id,
             'title' => 'Access Others Document',
             'slug' => 'app.othersDocument.index',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleOthersDocument->id,
             'title' => 'Create Others Document',
             'slug' => 'app.othersDocument.create',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleOthersDocument->id,
             'title' => 'Edit Others Document',
             'slug' => 'app.othersDocument.edit',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleOthersDocument->id,
             'title' => 'Delete Others Document',
             'slug' => 'app.othersDocument.destroy',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleOthersDocument->id,
             'title' => 'Others Document Report',
             'slug' => 'app.othersDocument.report',
         ]);

         // ---------------- ppptaf management -------------------------//
         $modulePPPTAFFund = Module::updateOrCreate(['title' => 'PPPTAF Fund Management', 'slug'=>Str::slug('PPPTAF Fund Management')]);
         Permission::updateOrCreate([
             'module_id' => $modulePPPTAFFund->id,
             'title' => 'Access PPPTAF Fund',
             'slug' => 'app.ppptafFund.index',
         ]);
         Permission::updateOrCreate([
             'module_id' => $modulePPPTAFFund->id,
             'title' => 'Create PPPTAF Fund',
             'slug' => 'app.ppptafFund.create',
         ]);
         Permission::updateOrCreate([
             'module_id' => $modulePPPTAFFund->id,
             'title' => 'Edit PPPTAF Fund',
             'slug' => 'app.ppptafFund.edit',
         ]);
         Permission::updateOrCreate([
             'module_id' => $modulePPPTAFFund->id,
             'title' => 'Delete PPPTAF Fund',
             'slug' => 'app.ppptafFund.destroy',
         ]);
         Permission::updateOrCreate([
             'module_id' => $modulePPPTAFFund->id,
             'title' => 'PPPTAF Fund Amendment',
             'slug' => 'app.ppptafFund.amendment',
         ]);
         Permission::updateOrCreate([
             'module_id' => $modulePPPTAFFund->id,
             'title' => 'PPPTAF Fund Report',
             'slug' => 'app.ppptafFund.report',
         ]);

         // ---------------- fund recovery management -------------------------//
         $moduleFundRecovery = Module::updateOrCreate(['title' => 'Fund Recovery Management', 'slug'=>Str::slug('Fund Recovery Management')]);
         Permission::updateOrCreate([
            'module_id' => $moduleFundRecovery->id,
            'title' => 'Add Extra Percent',
            'slug' => 'app.fundRecovery.extraPercent',
        ]);
         Permission::updateOrCreate([
             'module_id' => $moduleFundRecovery->id,
             'title' => 'Access Fund Recovery',
             'slug' => 'app.fundRecovery.index',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleFundRecovery->id,
             'title' => 'Create Fund Recovery',
             'slug' => 'app.fundRecovery.create',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleFundRecovery->id,
             'title' => 'Edit Fund Recovery',
             'slug' => 'app.fundRecovery.edit',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleFundRecovery->id,
             'title' => 'Delete Fund Recovery',
             'slug' => 'app.fundRecovery.destroy',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleFundRecovery->id,
             'title' => 'Fund Recovery Amendment',
             'slug' => 'app.fundRecovery.amendment',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleFundRecovery->id,
             'title' => 'Fund Recovery Report',
             'slug' => 'app.fundRecovery.report',
         ]);

         // ---------------- ppptaf expense management -------------------------//
         $modulePPPTAFExpense = Module::updateOrCreate(['title' => 'PPPTAF Expense Management', 'slug'=>Str::slug('PPPTAF Expense Management')]);
         Permission::updateOrCreate([
             'module_id' => $modulePPPTAFExpense->id,
             'title' => 'Access PPPTAF Expense',
             'slug' => 'app.ppptafExpense.index',
         ]);
         Permission::updateOrCreate([
             'module_id' => $modulePPPTAFExpense->id,
             'title' => 'Create PPPTAF Expense',
             'slug' => 'app.ppptafExpense.create',
         ]);
         Permission::updateOrCreate([
             'module_id' => $modulePPPTAFExpense->id,
             'title' => 'Edit PPPTAF Expense',
             'slug' => 'app.ppptafExpense.edit',
         ]);
         Permission::updateOrCreate([
             'module_id' => $modulePPPTAFExpense->id,
             'title' => 'Delete PPPTAF Expense',
             'slug' => 'app.ppptafExpense.destroy',
         ]);
         Permission::updateOrCreate([
             'module_id' => $modulePPPTAFExpense->id,
             'title' => 'PPPTAF Expense Amendment',
             'slug' => 'app.ppptafExpense.amendment',
         ]);
         Permission::updateOrCreate([
             'module_id' => $modulePPPTAFExpense->id,
             'title' => 'PPPTAF Expense Report',
             'slug' => 'app.ppptafExpense.report',
         ]);

         // ----------------Dashboard management -------------------------//
         $moduleDashboard = Module::updateOrCreate(['title' => 'Dashobard Controll', 'slug'=>Str::slug('Dashobard Controll')]);
         Permission::updateOrCreate([
             'module_id' => $moduleDashboard->id,
             'title' => 'Access Dashobard',
             'slug' => 'app.dashboard.index',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleDashboard->id,
             'title' => 'Access Daily Transaction',
             'slug' => 'app.dashboard.dailyTransaction',
         ]);

        // ----------------Module management -------------------------//
        $module = Module::updateOrCreate(['title' => 'Module', 'slug'=>Str::slug('Module')]);
         
        Permission::updateOrCreate([
            'module_id' => $module->id,
            'title' => 'Project Utitlity Module',
            'slug' => 'app.utility.module',
        ]);

        Permission::updateOrCreate([
            'module_id' => $module->id,
            'title' => 'Project Module',
            'slug' => 'app.project.module',
        ]);

        Permission::updateOrCreate([
            'module_id' => $module->id,
            'title' => 'Feasibility Module',
            'slug' => 'app.feasibility.module',
        ]);

        Permission::updateOrCreate([
            'module_id' => $module->id,
            'title' => 'Constraction Agency Module',
            'slug' => 'app.constructionAgency.module',
        ]);

        Permission::updateOrCreate([
            'module_id' => $module->id,
            'title' => 'Cost Capital Module',
            'slug' => 'app.costCapital.module',
        ]);

        Permission::updateOrCreate([
            'module_id' => $module->id,
            'title' => 'Phase Module',
            'slug' => 'app.phase.module',
        ]);

        Permission::updateOrCreate([
            'module_id' => $module->id,
            'title' => 'Procurement Module',
            'slug' => 'app.procurementDetails.module',
        ]);

        Permission::updateOrCreate([
            'module_id' => $module->id,
            'title' => 'Other Document Module',
            'slug' => 'app.otherDocument.module',
        ]);

        Permission::updateOrCreate([
            'module_id' => $module->id,
            'title' => 'User Module',
            'slug' => 'app.users.module',
        ]);

        Permission::updateOrCreate([
            'module_id' => $module->id,
            'title' => 'Account Module',
            'slug' => 'app.accounttype.module',
        ]);

        Permission::updateOrCreate([
            'module_id' => $module->id,
            'title' => 'Budget Module',
            'slug' => 'app.ppptafbudget.module',
        ]);

        Permission::updateOrCreate([
            'module_id' => $module->id,
            'title' => 'Recovery Module',
            'slug' => 'app.budgetRecovery.module',
        ]);

    }
}
