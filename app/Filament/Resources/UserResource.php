<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('title')
                    ->label('First post title')
                    ->state(function (User $record) {
                        return $record->posts()->where('position', 1)->first()?->title ?? '--';
                    })
                    // ->sortable(query: function (Builder $query, string $direction): Builder {
                    //     return $query
                    //         ->leftJoin('posts', function ($join) {
                    //             $join->on('posts.user_id', '=', 'users.id')
                    //                 ->where('posts.position', '=', 1);
                    //         })
                    //         ->orderBy('posts.title', $direction)
                    //         ->select('users.*');
                    // })
                    ->searchable(query: function (Builder $query, string $search): Builder {
                        return $query
                            ->leftJoin('posts', function ($join) {
                                $join->on('posts.user_id', '=', 'users.id');
                            })
                            ->where('posts.title', 'like', '%' . $search . '%')
                            ->select('users.*');
                    }),
            ])
            // ->defaultSort('title')
            ->filters([
                //
            ])
            ->actions([

            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    //
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
