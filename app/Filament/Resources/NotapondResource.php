<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Notapond;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\Placeholder;
use App\Filament\Resources\NotapondResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\NotapondResource\RelationManagers;
use App\Models\Hargapond;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Repeater;

class NotapondResource extends Resource
{
    protected static ?string $model = Notapond::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Group::make()
                //     ->schema([
                Card::make()
                    ->schema([

                        TextInput::make('no_pond')
                            ->default(state: 'PND-' . '001')
                            ->disabled(),

                        Select::make('customer_id')
                            ->relationship('customer', 'name'),


                        DatePicker::make('tanggal')
                            ->default(now())
                            ->disabled(),



                        // TextInput::make('nama_barang_pond'),
                        // TextInput::make('quantity_pond'),
                        // Select::make('hargapond_id')
                        //     ->relationship('hargapond', 'label_harga')

                    ])->columns(['md' => 3]),

                Card::make()
                    ->schema([

                        Placeholder::make('Label'),
                        //repeater mulai disini
                        Repeater::make('notaponditem')
                            ->relationship()
                            ->schema([ 



                                //     ->options(Notapond::query()->pluck('no_pond', 'id')),

                                TextInput::make(name: 'nama_barang')
                                    ->columnSpan([
                                        'md' => 2,
                                    ]),
                                TextInput::make(name: 'quantity')
                                    ->numeric()
                                    ->default(state:1)
                                    ->columnSpan([
                                        'md' => 2,
                                    ]),

                                // hidden::make('notapond_id'),
                                Select::make(name:'hargapond_id')
                                    ->options(Hargapond::query()->pluck(column: 'harga_pond', key: 'id'))
                                    ->reactive(),
                                    
                                   


                                // Select::make('hargapond_id')
                                //     ->relationship('hargapond', 'harga_pond')
                                // TextInput::make('harga_pond')
                                //     ->columnSpan([
                                //         'md' => 2,
                                //     ]),
                                


                            ])
                            ->defaultItems(1)
                            ->columnSpan('full')

                    ])

                // ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('no_pond'),
                TextColumn::make('customer.name'),
                TextColumn::make('tanggal'),

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
