<?php

class BankAccount implements IfaceBankAccount
{
    private $balance = null;

    public function __construct(Money $openingBalance)
    {
		$this->balance = $openingBalance;
	}
    public function deposit(Money $amount)
    {
        $this->balance = (string) $this->balance + $amount-> value();
    }
	
	public function withdraw(Money $amount)
    {
		$this->balance = (string) $this->balance - $amount-> value();
		if ((int) $this->balance < 0)
		{
			$this->balance += $amount-> value();
			throw new Exception("Withdrawl amount larger than balance");
		}
    }

    public function transfer(Money $amount, BankAccount $account)
    {
		$this->balance = (string) $this->balance - $amount-> value();
		if ((int) $this->balance < 0)
		{
			$this->balance += $amount-> value();
			throw new Exception("Withdrawl amount larger than balance");
		}
		$account->deposit($amount);
    }
	public function balance()
    {	
		return $this->balance;
    }
}