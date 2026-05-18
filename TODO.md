# TODO

## Step 1: Fix Dashboard Overview rendering
- Rewrite the broken Dashboard Overview section in `resources/views/dashboard.blade.php` to valid Blade syntax.

## Step 2: Fix ItemPolicy authorization
- Remove duplicated “always false” methods from `app/Policies/ItemPolicy.php`.

## Step 3: Improve Items CRUD performance
- Update `app/Http/Controllers/ItemController.php@index` to use pagination.
- Update `resources/views/items/index.blade.php` to display pagination links and counts correctly.

## Step 4: Smoke test
- Run a quick route flow check: login -> dashboard -> items index -> create/edit/delete.
- Ensure authorization works (users can only modify own items).
