<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StockistResource\Pages;
use App\Filament\Resources\StockistResource\RelationManagers;
use App\Models\Stockist;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StockistResource extends Resource
{
    protected static ?string $model = Stockist::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup  = 'Oneseven Partner';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Data Member')
                        ->schema([
                            Forms\Components\TextInput::make('name')
                                ->required()
                                ->maxLength(255),
                            Forms\Components\TextInput::make('email')
                                ->email()
                                ->maxLength(255),
                            Forms\Components\TextInput::make('phone')
                                ->tel()
                                ->maxLength(255),
                            Forms\Components\Textarea::make('address')
                                ->columnSpanFull(),
                            Forms\Components\FileUpload::make('foto_profile')
                            ->image()
                                ->directory('distributor/profile'),
                            Forms\Components\FileUpload::make('foto_ktp')
                            ->image()
                                ->directory('distributor/ktp'),
                            Forms\Components\Toggle::make('is_active')
                            ->required(),
                        ])
                    ]),

                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Sosial Media')
                        ->schema([
                            Forms\Components\TextInput::make('facebook')
                            ->maxLength(255),
                            Forms\Components\TextInput::make('instagram')
                            ->maxLength(255),
                            Forms\Components\TextInput::make('tiktok')
                                ->maxLength(255),
                        ])
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('foto_profile')
                    ->searchable(),
                Tables\Columns\TextColumn::make('foto_ktp')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListStockists::route('/'),
            'create' => Pages\CreateStockist::route('/create'),
            'edit' => Pages\EditStockist::route('/{record}/edit'),
        ];
    }
}
