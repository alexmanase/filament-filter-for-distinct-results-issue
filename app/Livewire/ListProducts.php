<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class ListProducts extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table)
    {
        return $table
            ->query(Product::query())
            ->columns([
                TextColumn::make('name')
            ])
            ->filters([
                Filter::make('is_unique')->query(function (Builder $query) {
                    return $query->select()->groupBy('name');
                })
            ])
        ;
    }
    
    public function render()
    {
        return view('livewire.list-products');
    }
}