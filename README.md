# Laravel Pending Update

This package can make a model will pertain their original data when it is updated, while the updated fields will be stored to an update model. Later, you can apply the update or cancel the update

Once installed you can do stuff like this:

```php

$model = Model::where("name", "Sugiarto");
$model->name = 'Bambang';
$model->pendingUpdate(); // put this after you've made the changes
$model->save();
echo $model->name;
// this won't print 'Bambang', but will still print 'Sugiarto'
// but if you do
$model->usePending();
echo $model->name;
// it will print Bambang;

// then if you want to apply the updated model to the original, you use
$model->applyUpdate();
// or to cancel:
$model->cancelUpdate();

```
## Instalation

1. You can install the package with composer. Inside your Laravel project folder, type:

```
composer require nocturnalsm/pendingupdate
```

2. Optional: The service provider will automatically get registered. Or you may manually add the service provider in your ```config/app.php``` file.

```php

'providers' => [
    // ...
    NocturnalSm\PendingUpdate\PendingUpdateServiceProvider::class,
];

```

3. Publish the migration files

```
php artisan vendor:publish --provider="NocturnalSm\PendingUpdate\PendingUpdateServiceProvider" --tag=migrations
```

4. And run the migration

```
php artisan migrate
```

5. Add the PendingUpdate trait to your model

```php

use NocturnalSm\PendingUpdate\PendingUpdate;

class Model extends Model
{
    use PendingUpdate;
}

```

## Functions

```php

// pending the update
$model->pendingUpdate();

// apply update to the data
$model->applyUpdate();

// cancel the update and return the data to the original 
$model->cancelUpdate();

// return pending updates for the model
$model->updates();

// check if the pending data with the specified $key column has change
$model->hasPendingValue($key);

// get the pending value for a column specified with $key
$model->getPendingValue($key);

// make subsequent call to the data values to return the pending value
$model->usePending(); 

// make subsequent call to the data values to return the original value
$model->useOriginal();

```

## Need a UI?

The package doesn't come with any UI, you should build that yourself. But you can contact me if you want to implement it.

## Contact & Support

I'm a web developer from Indonesia. I offer services on web development, especially using Laravel. Please email me at [basugi99@gmail.com](mailto:basugi99@gmail.com).

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
