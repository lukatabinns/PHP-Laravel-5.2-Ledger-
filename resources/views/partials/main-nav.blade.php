@if(Auth::check())
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Petshop</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="{{ URL('auth/dash') }}">Home</a></li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Accounts
            <span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
            <li><a href="{{ route('account_index') }}">Accounts</a></li>
            <li><a href="{{ route('account_balance') }}">Balance</a></li>
            <li><a href="{{ route('account_create') }}">Create Account</a></li>
        </ul>
       </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Transactions
            <span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
            <li><a href="{{ route('transaction_index') }}">Transactions</a></li>
            <li><a href="{{ route('expense_index') }}">Expense</a></li>
            <li><a href="{{ route('transaction_create') }}">Income</a></li>
        </ul>
       </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Payer
            <span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
            <li><a href="{{ route('payer_index') }}">Payer</a></li>
        </ul>
       </li>
        <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Payee
            <span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
            <li><a href="{{ route('payee_index') }}">Payee</a></li>
        </ul>
       </li>
       <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Category
            <span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
            <li><a href="{{ route('expense_category') }}">Expense</a></li>
            <li><a href="{{ route('income_category') }}">Income</a></li>
        </ul>
       </li>
       <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Payment Method
            <span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
            <li><a href="{{ route('paymethod_index') }}">Payment Method</a></li>
        </ul>
       </li>
       <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Animals
            <span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
            <li><a href="{{ route('animal_index') }}">Animals</a></li>
            <li><a href="{{ route('animal_create') }}">Create Animals</a></li>
            <li><a href="{{ route('animal_type') }}">Animal Type</a></li>
            <li><a href="{{ route('animal_balance') }}">Balance</a></li>
        </ul>
       </li>
       <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Animal Food
            <span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
            <li><a href="{{ route('animalfood_index') }}">Animal Food</a></li>
            <li><a href="{{ route('animalfood_create') }}">Create Animal Food </a></li>
            <li><a href="{{ route('animalfood_type') }}">Animal Food Type</a></li>
        </ul>
       </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> {{ Auth::user()->name }}</a></li>-->
      <li><a href="{{ route('logout') }}"><span class="glyphicon glyphicon-log-in"></span>Logout</a></li>
    </ul>
  </div>
</nav>
@endif