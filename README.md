# Enable updates to be pending before it is applied

This package basically is a trait that makes a model using it will pertain their original data when it is updated, while the updated fields will be stored to an update model. Later, you can apply the update or cancel the update

Once installed you can do stuff like this:

```php

// whenever a model is updated, the original data will be pertained;
$model = Model::where("name", "Sugiarto");
$model->name = 'Bambang';
$model->save();
echo $model->name;
// this won't print 'Bambang', but still print 'Sugiarto'
// but if you do
$model->usePending();
echo $model->name;
// it will print Bambang;

// then if you want to apply the updated model to the original, you use
$model->applyUpdate();
// or to cancel:
$model->cancelUpdate();

```

## Need a UI?

The package doesn't come with any UI, you should build that yourself. But you can contact me if you want to implement it.

## Contact & Support

I'm a web developer from Indonesia. I offer services on web development, especially using Laravel. Please email me at [basugi99@gmail.com](mailto:basugi99@gmail.com).

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
