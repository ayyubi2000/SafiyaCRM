<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
class ReportsController extends Controller
{
    public function bestSellingProducts()
    {
        return $this->render('best-selling-product');
    }

    public function bestCustomers()
    {
        return $this->render('bestCustomer');
    }

    public function customerBirthdays()
    {
        return $this->render('birthdays');
    }
}
