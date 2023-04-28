# Maintenance Mode

> Customizable maintenance mode

## Install

```sh
composer require nearata/flarum-ext-maintenance-mode:"*"
```

## Update

```sh
composer update nearata/flarum-ext-maintenance-mode:"*"
php flarum cache:clear
```

## Remove

```sh
composer remove nearata/flarum-ext-maintenance-mode
php flarum cache:clear
```

## How to use

Switch the `Maintenance Mode` in the extension settings page.

Or with API endpoint

```bash
/api/nearata/maintenanceMode/enabled
```

```json
{
  "value": true or false
}
```

if the body is empty, it will be evaluated as false

## How to style

To change the style of the page, there's no other way but to override the file itself.

Follow the below link to see a how-to:

https://docs.flarum.org/extend/views/#overriding-views

## How to bypass maintenance

If you have permissions to bypass the maintenance mode,
you can run the below command to generate a link to login
in a authorized user.

Assure you are in the `Flarum root folder`:

```bash
php flarum nearataMaintenanceMode:auth <user_id>
```
