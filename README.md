<p style="text-align: center;">
<img width="400" src="https://i.imgur.com/rAtLy70.png" />
</p>

# Loki, WordPress Theme Boilerplate

[![GitHub release](https://img.shields.io/github/v/release/codebjorn/loki?include_prereleases)](https://github.com/codebjorn/loki/releases)
[![Generic badge](https://img.shields.io/badge/Stability-Alpha-<COLOR>.svg)](https://shields.io/)

Loki is WordPress Theme Boilerplate using as a base [Mjolnir](https://github.com/codebjorn/mjolnir) Framework

If you think this approach is not working, please open an issue and let's discuss :)

## Pre-Requirements

Before we proceed further, I suggest you to read documentation for:

1. [Mjolnir](https://github.com/codebjorn/mjolnir) Framework.
2. [Laravel Blade](https://laravel.com/docs/6.x/blade)
3. [Laravel Mix](https://laravel-mix.com/)

## Requirements

Requirements for this boilerplate are:

- PHP 7.1+
- Composer

## Installation

You can install framework via composer:

```bash
composer create-project codebjorn/loki
```

## Structure

Structure of boilerplate is:

```
|-- app                   // Folder where is stored all Facades,Services,Providers
|   |--Facades            // Folder that stores all facades used to get utilities & services from container
|   |--Providers          // Folder that stores all your providers
|   |--App.php            // Container file
|   |--Helpers.php        // File that store all functions need it for project
|-- assets                // Folder where all builded assets are stored
|-- blocks                // Folder where are stored all Gutenberg blocks
|   |-- <blockFolder>     // Folder with block
|       |-- components    // Folder where are stored all js components for Gutenberg
|       |-- data          // Folder where are stored json files such as attributes
|       |-- view          // Folder where is stored blade files for render
|       |-- index.jsx     // Block configuration file
|   |-- blocks.js         // File where is imported all blocks
|   |-- blocks.php        // File where are registered blocks using Block Facade
|-- config                // Folder where are stored configurations
|-- hooks                 // Folder where is stored all hooks
|   |-- actions.php       // File where are created new action hooks using Action Facade
|   |-- filters.php       // File where are created new filter hooks using Filter Facade
|-- resources             // Folder that stores all js,scss,views elements of theme
|   |-- js                // Folder for js of theme
|   |-- scss              // Folder for scss of theme
|   |-- views             // Folder for blade templates
|-- templates             // Folder where default wordpress templates are stored
|-- vendor                // Composer packages folder
|-- functions.php         // Default WP Functions.php 
|-- webpack.mix.js        //Laravel Mix configuration file
```

## How all work

#### Add service into hook

1. Create a new namespace in `app` folder and add new php service class
2. Resolve this service using Service Provider in `app/Providers` folder, you can add it to `AppServiceProvider.php` or
   create a new provider and add it to `config/app.php` to load. More info
   about [service providers](https://container.thephpleague.com/3.x/service-providers/)
3. After resolving a service you can [inject](https://container.thephpleague.com/3.x/dependency-injection/) it in
   another service or add it into hook in `hooks` folder, for example action hook:

```php
Action::add('wp_enqueue_scripts', [\Namespace\Setup\Enqueues::class, 'front']);
Action::add('admin_enqueue_scripts', [\Namespace\Setup\Enqueues::class, 'admin']);
```

#### Work with WordPress templates

By default, all WordPress templates are stored in `templates` folder, you can change folder or disable this feature
in `config/theme.php`.

To use templates and laravel blade engine we can use templates as kind of controller that will store all data that we
need but render will make template engine, for example:

1. Let's say we want to create/update template `single.php`, we create a new file `templates/single.php`

```php
<?php

$post = \Mjolnir\Utils\Post::current();
$postTitle = $post->getTitle();
$postContent = $post->getContent();

\Loki\Facades\View::render('single', ['title' => $postTitle, 'content' => $postContent]);
```

2. We create blade file in `resources/views/single.blade.php`

```
@extends('layout.app')

@section('content')
    <h1>{{$title}}</h1>
    {!! $content !!}
@endsection
```

#### Create Gutenberg Blocks

All blocks are stored in `blocks` folder. For creating a new block we will need:

1. Create a folder inside `blocks` folder
2. Create `index.jsx` in your new folder

```javascript
import {__} from '@wordpress/i18n';
import {Fragment} from '@wordpress/element';
import Controls from "./components/controls";
import Editor from "./components/editor";
import Inspector from "./components/inspector";
import * as attributes from "./data/attributes.json";

const {registerBlockType} = wp.blocks;

export default registerBlockType('namespace/name', {
    title: __('Name', 'name'),
    attributes: attributes,
    edit: props => {
        return (
            <Fragment>
                <Controls {...props} />
                <Editor {...props} />
                <Inspector {...props} />
            </Fragment>
        );
    },
    save() {
        //gutenberg will save attributes we can use in server-side callback
        return null;
    },
});
```

3. Create all components inside components folder:

- `controls.jsx` - Toolbar of block

```javascript
import {BlockControls} from '@wordpress/block-editor';

function Controls() {
    return (
        <BlockControls>
        </BlockControls>
    );
}

export default Controls;
```

- `editor.jsx` - Main area of block

```javascript
function Editor({attributes, setAttributes}) {
    console.log(attributes)
    return (
        <div className="name">
            <h1>Hello, {attributes.title}</h1>
        </div>
    );
}

export default Editor;
```

- `inspector.jsx` - Sidebar panels

```javascript
import {__} from '@wordpress/i18n';
import {InspectorControls} from '@wordpress/block-editor';
import {PanelBody, PanelRow} from '@wordpress/components';

function Inspector({attributes, setAttributes}) {
    return (
        <InspectorControls>
            <PanelBody title={__('Name')}>
                <PanelRow>

                </PanelRow>
            </PanelBody>
        </InspectorControls>
    );
}

export default Inspector;
```

4. Create `data` folder and new attributes.json file:

```json
{
  "classNames": {
    "default": "hero",
    "type": "string"
  },
  "title": {
    "default": "This is title",
    "type": "string"
  }
}
```

Also, you can use data folder to store and other json folder that can be used in you block.

5. Create `view` folder where will be stored blade templates for your block, default one is `block.blade.php`:

```
<div class="{{$attributes->classNames}}">
 <h1>{{$attributes->title}}</h1>
 @include('hero.view.partials.element')
</div>
```

6. Import you block in main `blocks.js`
7. Add block in main `blocks.php` using block facade:
```php
\Namespace\Facades\Block::add('namespace', 'name');
```

### Testing

//TODO

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email quotesun@gmail.com instead of using the issue tracker.

## Credits

- [Dorin Lazar](https://github.com/codebjorn)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
