# Mini ERP - Inventory & Procurement Module

## Project Information

**Company:** Fleek Bangladesh  
**Position:** Junior Laravel Developer  
**Project:** Mini ERP - Inventory & Procurement Module  

A Laravel 12 based Mini ERP Procurement System developed for managing inventory and procurement workflow.

The system allows employees to create purchase requisitions, managers to approve/reject requisitions, and procurement users to generate purchase orders from approved requisitions.

---

# Technology Stack

- Laravel 12
- PHP 8.2+
- MySQL
- Blade Template Engine
- Bootstrap 5
- Eloquent ORM
- Git & GitHub


---

# Project Features

## Dashboard

Dashboard provides a quick overview of the system.

Features:

- Total Products
- Total Suppliers
- Pending Purchase Requisitions
- Approved Purchase Requisitions
- Recent Purchase Orders


---

# Product Management

Product module includes:

- Create Product
- Update Product
- Delete Product
- Product Listing
- SKU Management
- Unit Management
- Current Stock Tracking


Product Fields:

```
id
sku
name
unit
current_stock
```


---

# Supplier Management

Supplier module includes:

- Create Supplier
- Update Supplier
- Delete Supplier
- Supplier Listing


Supplier Fields:

```
id
name
phone
```


---

# Purchase Requisition (PR)

Employees can create purchase requisitions with multiple products.


Features:

- Multiple products in one requisition
- Auto generated PR number
- Quantity validation
- Duplicate product prevention
- Transaction based storage


Example PR Number:

```
PR-00001
PR-00002
PR-00003
```


Purchase Requisition Fields:

```
id
requisition_no
employee_id
department_id
status
```


Requisition Item Fields:

```
id
requisition_id
product_id
quantity
remarks
```


---

# Purchase Requisition Workflow


```
Employee

    |
    |
Create Purchase Requisition

    |
    |
Pending

    |
    |
Manager Review

    |
    |
Approved / Rejected

```


Rules:

- Pending PR can be edited
- Approved PR cannot be edited
- Approved PR cannot be deleted


---

# Approval Workflow

Available statuses:


```
pending
approved
rejected
```


Manager can:

- Approve Purchase Requisition
- Reject Purchase Requisition


---

# Purchase Order (PO)


Purchase Order can only be created from approved Purchase Requisition.


Features:

- Create PO from approved PR
- Supplier selection
- Auto generated PO number
- Order date tracking
- PO listing


Example:

```
PO-00001
PO-00002
PO-00003
```


Purchase Order Fields:

```
id
po_no
requisition_id
supplier_id
order_date
```


---

# Search & Filter


Purchase Requisition search:

- Search by PR Number
- Search by Employee Name
- Search by Department Name


Filter:

- Pending
- Approved
- Rejected


---

# Database Relationship


```
Department

    |
    |
    └── Employee

            |
            |
            └── Purchase Requisition

                    |
                    |
                    └── Requisition Items

                            |
                            |
                            └── Product



Purchase Requisition

            |
            |
            └── Purchase Order

                    |
                    |
                    └── Supplier

```


---

# Laravel Architecture


## Controllers

Location:

```
app/Http/Controllers
```


Implemented Controllers:


```
DashboardController

ProductController

SupplierController

PurchaseRequisitionController

PurchaseOrderController

```


---

## Models

Location:

```
app/Models
```


Models:


```
Department

Employee

Supplier

Product

PurchaseRequisition

RequisitionItem

PurchaseOrder

```


---

# Validation


Implemented validations:


- Required field validation
- Foreign key validation
- Quantity must be greater than zero
- Duplicate product prevention
- Approved PR protection


Example:

```php
$request->validate([
    'quantity' => 'required|integer|min:1'
]);
```


---

# Database Transaction


Purchase Requisition creation uses database transaction to maintain data consistency.


Example:


```php
DB::transaction(function(){

    // Store requisition

    // Store requisition items

});
```


---

# Query Optimization


Implemented:

- Eager Loading
- Pagination
- Relationship optimization


Example:


```php
PurchaseOrder::with([
    'supplier',
    'purchaseRequisition'
])
->paginate(10);
```


---

# Installation Guide


## Clone Repository


```bash
git clone YOUR_GITHUB_REPOSITORY_URL
```


Go to project:


```bash
cd mini-erp
```


---

## Install Composer Dependencies


```bash
composer install
```


---

## Environment Setup


Copy environment file:


```bash
cp .env.example .env
```


Generate application key:


```bash
php artisan key:generate
```


---

# Database Configuration


Update `.env` file:


```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=mini_erp
DB_USERNAME=root
DB_PASSWORD=
```


---

# Run Migration


```bash
php artisan migrate
```


---

# Run Seeder


```bash
php artisan db:seed
```


---

# Start Application


```bash
php artisan serve
```


Application URL:


```
http://127.0.0.1:8000
```


---

# Git Workflow


Project development was maintained using Git commits.


Example commit history:


```
Initial Laravel setup

Created database migrations

Added models and relationships

Implemented Product CRUD

Implemented Supplier CRUD

Created Purchase Requisition module

Added PR approval workflow

Implemented Purchase Order module

Created Dashboard

Added search and filtering

Completed README documentation
```


---

# Database Tables


Main tables:


```
departments

employees

suppliers

products

purchase_requisitions

requisition_items

purchase_orders

```


---

# Seeder Data


Seeder provides sample data for:


- Departments
- Employees
- Suppliers
- Products


Run:


```bash
php artisan db:seed
```


---

# Future Improvements


Possible improvements:


- Authentication system
- Role permission management
- Stock update after PO receiving
- Product search API
- PDF Report Export
- Excel Export
- Advanced Dashboard Charts


---

# Developer Information


**Developer:** Anik Mondol

**Role:** Junior Laravel Developer

**Framework:** Laravel 12


---

# License


This project was developed for technical assessment purposes.
