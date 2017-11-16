<?php

// Site
Breadcrumbs::register('site', function($breadcrumbs)
{
    $breadcrumbs->push('Головна', route('site'));
});


/////////////////////////////////////////////////////////////////////////////Admin

//Admin-Index
Breadcrumbs::register('admin', function($breadcrumbs)
{
    $breadcrumbs->push('Головна', route('home'));
});



///////////////////////////////////Admin-Pages

// Home > Pages
Breadcrumbs::register('adminPagesIndex', function($breadcrumbs)
{
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Сторінки', route('pagesIndex'));
});

// Home > Pages > Add
Breadcrumbs::register('adminPagesAdd', function($breadcrumbs)
{
    $breadcrumbs->parent('adminPagesIndex');
    $breadcrumbs->push('Додати сторінку', route('pagesAdd'));
});

// Home > Pages > [PagesEdit]
Breadcrumbs::register('adminPagesEdit', function($breadcrumbs, $pages)
{
    $breadcrumbs->parent('adminPagesIndex');
    $breadcrumbs->push('Редагування - '.$pages['name']);
});

// Home > Pages > [PagesView]
Breadcrumbs::register('adminPagesView', function($breadcrumbs, $page)
{
    $breadcrumbs->parent('adminPagesIndex');
    $breadcrumbs->push('Перегляд - '.$page->name);
});

///////////////////////////////////Admin-Pages



///////////////////////////////////Admin-Category

// Home > Category
Breadcrumbs::register('adminCategoryIndex', function($breadcrumbs)
{
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Категорії', route('categoryIndex'));
});

// Home > Category > Add
Breadcrumbs::register('adminCategoryAdd', function($breadcrumbs)
{
    $breadcrumbs->parent('adminCategoryIndex');
    $breadcrumbs->push('Додати категорію', route('categoryAdd'));
});

// Home > Category > [CategoryEdit]
Breadcrumbs::register('adminCategoryEdit', function($breadcrumbs, $category)
{
    $breadcrumbs->parent('adminCategoryIndex');
    $breadcrumbs->push('Редагування - '.$category['name']);
});

// Home > Category > [CategoryView]
Breadcrumbs::register('adminCategoryView', function($breadcrumbs, $category)
{
    $breadcrumbs->parent('adminCategoryIndex');
    $breadcrumbs->push('Перегляд - '.$category->name);
});

///////////////////////////////////Admin-Category




///////////////////////////////////Admin-User

// Home > User
Breadcrumbs::register('adminUserIndex', function($breadcrumbs)
{
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Користувачі', route('userIndex'));
});

// Home > User > Add
Breadcrumbs::register('adminUserAdd', function($breadcrumbs)
{
    $breadcrumbs->parent('adminUserIndex');
    $breadcrumbs->push('Додати користувача', route('userAdd'));
});

// Home > User > [UserEdit]
Breadcrumbs::register('adminUserEdit', function($breadcrumbs, $user)
{
    $breadcrumbs->parent('adminUserIndex');
    $breadcrumbs->push('Редагування - '.$user['name']);
});

// Home > Users > [UserPassword]
Breadcrumbs::register('adminUserPassword', function($breadcrumbs, $user)
{
    $breadcrumbs->parent('adminUserIndex');
    $breadcrumbs->push('Зміна пароля для - '.$user['name'], route('userPassword', $user['id']));
});

// Home > User > [UserView]
Breadcrumbs::register('adminUserView', function($breadcrumbs, $user)
{
    $breadcrumbs->parent('adminUserIndex');
    $breadcrumbs->push('Перегляд - '.$user->name);
});

///////////////////////////////////Admin-User



///////////////////////////////////Admin-Perm

// Home > Perm
Breadcrumbs::register('adminPermIndex', function($breadcrumbs)
{
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Дозволи', route('permIndex'));
});

// Home > Perm > Add
Breadcrumbs::register('adminPermAdd', function($breadcrumbs)
{
    $breadcrumbs->parent('adminPermIndex');
    $breadcrumbs->push('Додати дозвіл', route('permAdd'));
});

// Home > Perm > [PermEdit]
Breadcrumbs::register('adminPermEdit', function($breadcrumbs, $perm)
{
    $breadcrumbs->parent('adminPermIndex');
    $breadcrumbs->push('Редагування - Дозвіл -> '.$perm['name']);
});

// Home > Perm > [PermView]
Breadcrumbs::register('adminPermView', function($breadcrumbs, $perm)
{
    $breadcrumbs->parent('adminPermIndex');
    $breadcrumbs->push('Перегляд - Дозвіл -> '.$perm->name);
});

///////////////////////////////////Admin-Perm


///////////////////////////////////Admin-Roles

// Home > Roles
Breadcrumbs::register('adminRolesIndex', function($breadcrumbs)
{
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Ролі', route('rolesIndex'));
});

// Home > Roles > Add
Breadcrumbs::register('adminRolesAdd', function($breadcrumbs)
{
    $breadcrumbs->parent('adminRolesIndex');
    $breadcrumbs->push('Додати роль', route('rolesAdd'));
});

// Home > Roles > [RolesEdit]
Breadcrumbs::register('adminRolesEdit', function($breadcrumbs, $roles)
{
    $breadcrumbs->parent('adminRolesIndex');
    $breadcrumbs->push('Редагування - Роль -> '.$roles['name']);
});

// Home > Roles > [RolesView]
Breadcrumbs::register('adminRolesView', function($breadcrumbs, $roles)
{
    $breadcrumbs->parent('adminRolesIndex');
    $breadcrumbs->push('Перегляд - Роль -> '.$roles->name);
});

///////////////////////////////////Admin-Roles






//////////////////////////////////Admin-System

// Home > Info
Breadcrumbs::register('adminInfo', function($breadcrumbs)
{
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Інформація');
});

// Home > Setting
Breadcrumbs::register('adminSetting', function($breadcrumbs)
{
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Настройки');
});

// Home > Log
Breadcrumbs::register('adminLog', function($breadcrumbs)
{
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Логи');
});

// Home > Cache
Breadcrumbs::register('adminCache', function($breadcrumbs)
{
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Кеш');
});


///////////////////////////////////Admin-Security

// Home > Security
Breadcrumbs::register('adminSecurityIndex', function($breadcrumbs)
{
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Захист', route('securityIndex'));
});

// Home > Security > Add
Breadcrumbs::register('adminSecurityAdd', function($breadcrumbs)
{
    $breadcrumbs->parent('adminSecurityIndex');
    $breadcrumbs->push('Додати ip');
});

// Home > Security > [SecurityEdit]
Breadcrumbs::register('adminSecurityEdit', function($breadcrumbs, $security)
{
    $breadcrumbs->parent('adminSecurityIndex');
    $breadcrumbs->push('Редагування - '.$security['ip']);
});

// Home > Security > [SecurityView]
Breadcrumbs::register('adminSecurityView', function($breadcrumbs, $security)
{
    $breadcrumbs->parent('adminSecurityIndex');
    $breadcrumbs->push('Перегляд - '.$security->ip);
});

///////////////////////////////////Admin-Security



//////////////////////////////////Admin-System


?>