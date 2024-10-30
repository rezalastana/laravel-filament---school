<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentResource\Pages;
use App\Filament\Resources\StudentResource\RelationManagers;
use App\Models\Student;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StudentResource extends Resource
{
    protected static ?string $model = Student::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                ->schema([
                  TextInput::make('nis')
                    ->label('NIS'),
                  TextInput::make('name')
                    ->label('Nama')
                    ->required(),

                  Select::make('gender')
                    ->label('Gender')
                    ->options([
                      "Male" => "Male",
                      "Female" => "Female",
                    ]),
                  DatePicker::make('birthday')
                    ->maxDate(now()),
                  Select::make('religion')
                    ->options([
                      "Islam" => "Islam",
                      "Katolik" => "Katolik",
                      "Protestan" => "Protestan",
                      "Hindu" => "Hindu",
                      "Budhha" => "Budhha",
                      "Khonghucu" => "Khonghucu",
                    ]),
                  TextInput::make('contact'),
                  FileUpload::make('profile')
                    ->directory('students')
                    ->columnSpan(2),
                ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nis')
                  ->label('NIS'),
                TextColumn::make('name')
                  ->label('Nama'),
                TextColumn::make('gender'),
                TextColumn::make('birthday'),
                ImageColumn::make('profile'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStudents::route('/'),
            'create' => Pages\CreateStudent::route('/create'),
            'edit' => Pages\EditStudent::route('/{record}/edit'),
        ];
    }
}
