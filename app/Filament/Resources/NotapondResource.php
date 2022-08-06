<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Notapond;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\NotapondResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\NotapondResource\RelationManagers;

class NotapondResource extends Resource
{
    protected static ?string $model = Notapond::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([

                        TextInput::make('no_pond'),
                        Select::make('customer_id')
                            ->relationship('customer', 'name'),
                        TextInput::make('nama_barang_pond'),
                        TextInput::make('quantity_pond'),
                        Select::make('hargapond_id')
                            ->relationship('hargapond', 'label_harga')





                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('no_pond'),
                TextColumn::make('customer.name'),
                TextColumn::make('nama_barang_pond'),
                TextColumn::make('quantity_pond'),
                TextColumn::make('hargapond.harga_pond'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListNotaponds::route('/'),
            'create' => Pages\CreateNotapond::route('/create'),
            'edit' => Pages\EditNotapond::route('/{record}/edit'),
        ];
    }
}
