# Shopping cart app

## Technical Requirements

- PHP7 +
- Recommended to use `Composer` for autoloading
- 3rd party libraries can be used if needed, but preferably no big frameworks
- App should be executed from console
- Solution's source code should be provided in a GIT repository

## Nice to have requirements (optional)

- Unit tests
- Integration tests
- Ability to launch whole app with docker

## Task

### User story

Client asked us to develop Shopping cart app where customers can add, update and remove products. Products can be added in different quantities and currencies. At the moment, our client wants to support 3 currencies: `EUR`, `USD` and `GBP` with possibility to add more in the future. After every newly added/removed product the total balance of the cart should update.

### Requirements

- Supported currencies `EUR`, `USD` and `GBP`
- The shopping cart's default currency is `EUR`
- Exchange rates for currencies: `EUR:USD` - `1:1.14`, `EUR:GBP` - `1:0.88`

### Input

Input data is stored in text file where each column is separated by `;` character. There are 5 columns in each row:

1. Unique product identifier
2. Product name
3. Product quantity
4. Product price
5. Product's price currency

Product quantity column describes customer action. If quantity is 1 or more then product is being added/updated, if quantity is -1 or less, then product is being removed from shopping cart.

See example data set below.

```
mbp;Macbook Pro;2;29.99;EUR
zen;Asus Zenbook;3;99.99;USD
mbp,Macbook Pro;5,100.09,GBP
zen;Asus Zenbook;-1;;
len;Lenovo P1;8;60.33;USD
zen;Asus Zenbook;1;120.99;EUR
```

### Output
We expect the Shopping cart app to output cart's total to the console in default currency after every cart operation (add to cart, remove from cart).

### Expected application usage
1. User runs a CLI command to launch the application
2. Application reads the input file line by line
3. Application prints expected output to the console after reading each input line

## Additional information
It is not mandatory to provide a fully working solution - part of it can be enough. Emphasize on quality over quantity.

