<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryNilaiResource\Pages;
use App\Filament\Resources\CategoryNilaiResource\RelationManagers;
use App\Models\CategoryNilai;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Section;
use Filament\Forms\Set;
use Illuminate\Support\Str;

class CategoryNilaiResource extends Resource
{
  protected static ?string $model = CategoryNilai::class;

  protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

  // merubah nama menu pada sidebar
  protected static ?string $navigationLabel = 'Nilai Kategori';

  public static function form(Form $form): Form
  {
    return $form
      ->schema([
        Section::make()
          ->schema([
            TextInput::make('name')
              ->required()
              ->live(onBlur: true)
              ->live(debounce: 500)
              ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state)))
              ->maxLength(255),
            // jika ingin menggunakan disabled pada input, maka berikan nilai pada model yang diambil dari value 'name'
            TextInput::make('slug')
            // ->disabled()
          ])
      ]);
  }

  public static function table(Table $table): Table
  {
    return $table
      ->columns([
        TextColumn::make('name'),
        TextColumn::make('slug'),
      ])
      ->filters([
        //
      ])
      ->actions([
        Tables\Actions\EditAction::make(),
        Tables\Actions\DeleteAction::make(),
      ])
      ->bulkActions([
        Tables\Actions\BulkActionGroup::make([
          Tables\Actions\DeleteBulkAction::make(),
        ]),
      ]);
  }

  public static function getPages(): array
  {
    return [
      'index' => Pages\ManageCategoryNilais::route('/'),
    ];
  }
}
