<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProdutoResource\Pages;
use App\Filament\Resources\ProdutoResource\RelationManagers;
use App\Models\Produto;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProdutoResource extends Resource
{
    protected static ?string $model = Produto::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nome')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('codigo_id')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('fabricante_fornecedor')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('preco')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('num_serie')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('compatibilidade_robo')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('tempo_vida_util_horas')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('localizacao_almoxarifado')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nome')
                    ->searchable(),
                Tables\Columns\TextColumn::make('codigo_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('fabricante_fornecedor')
                    ->searchable(),
                Tables\Columns\TextColumn::make('preco')
                    ->searchable(),
                Tables\Columns\TextColumn::make('num_serie')
                    ->searchable(),
                Tables\Columns\TextColumn::make('compatibilidade_robo')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tempo_vida_util_horas')
                    ->searchable(),
                Tables\Columns\TextColumn::make('localizacao_almoxarifado')
                    ->searchable(),
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
            'index' => Pages\ListProdutos::route('/'),
            'create' => Pages\CreateProduto::route('/create'),
            'edit' => Pages\EditProduto::route('/{record}/edit'),
        ];
    }
}
