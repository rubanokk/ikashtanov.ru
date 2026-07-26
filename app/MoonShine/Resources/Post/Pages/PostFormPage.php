<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\Post\Pages;

use MoonShine\Laravel\Pages\Crud\FormPage;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\Contracts\UI\FormBuilderContract;
use MoonShine\UI\Components\FormBuilder;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\Core\TypeCasts\DataWrapperContract;
use App\MoonShine\Resources\Post\PostResource;
use MoonShine\Support\ListOf;
use MoonShine\UI\Fields\ID;
use MoonShine\UI\Components\Layout\Box;
use Throwable;
use VI\MoonShineSpatieTranslatable\Fields\Translatable;
use VI\MoonShineSpatieMediaLibrary\Fields\MediaLibrary;
use MoonShine\Laravel\Fields\Relationships\BelongsToMany;
use App\MoonShine\Resources\Category\CategoryResource;
use MoonShine\UI\Fields\Checkbox;
use MoonShine\UI\Fields\Date;

/**
 * @extends FormPage<PostResource>
 */
class PostFormPage extends FormPage
{
    /**
     * @return list<ComponentContract|FieldContract>
     */
    protected function fields(): iterable
    {
        return [
            Box::make([
                ID::make(),
                BelongsToMany::make(
                    'Категории',
                    'categories',
                    formatted: 'title',
                    resource: CategoryResource::class
                ),
                MediaLibrary::make('Изображение', 'post-preview'),
                Translatable::make('Заголовок', 'title')
                    ->priorityLanguages([config('app.fallback_locale'), config('app.locale')]),
                Translatable::make('Текст (ру)', 'content')->tinyMce()
                    ->priorityLanguages([config('app.fallback_locale'), config('app.locale')]),
                Date::make('Дата публикации', 'created_at')
                    ->format('Y-m-d'),
                Checkbox::make('Опубликовано', 'published'),
            ]),
        ];
    }

    protected function buttons(): ListOf
    {
        return parent::buttons();
    }

    protected function formButtons(): ListOf
    {
        return parent::formButtons();
    }

    protected function rules(DataWrapperContract $item): array
    {
        return [];
    }

    /**
     * @param  FormBuilder  $component
     *
     * @return FormBuilder
     */
    protected function modifyFormComponent(FormBuilderContract $component): FormBuilderContract
    {
        return $component;
    }

    /**
     * @return list<ComponentContract>
     * @throws Throwable
     */
    protected function topLayer(): array
    {
        return [
            ...parent::topLayer()
        ];
    }

    /**
     * @return list<ComponentContract>
     * @throws Throwable
     */
    protected function mainLayer(): array
    {
        return [
            ...parent::mainLayer()
        ];
    }

    /**
     * @return list<ComponentContract>
     * @throws Throwable
     */
    protected function bottomLayer(): array
    {
        return [
            ...parent::bottomLayer()
        ];
    }
}
