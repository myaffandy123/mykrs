<?php

namespace App\Filament\Resources;

use App\Models\KRS;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\MatkulKrs;
use App\Models\MataKuliah;
use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Resources\Resource;
use Filament\Actions\ActionGroup;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Repeater;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\Wizard\Step;
use App\Filament\Resources\KRSResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\KRSResource\RelationManagers;

class KRSResource extends Resource
{
    protected static ?string $model = KRS::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'KRS';
    protected static ?string $slug = 'krs';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Card::make()
                //     ->schema([
                //         TextInput::make('nama')
                //             ->required()
                //             ->label('Nama KRS')
                //             ->placeholder('Nama')
                //             ->columnSpanFull(),
                //         TextInput::make('deskripsi')
                //             ->label('Deskripsi')
                //             ->placeholder('Deskripsi'),
                //         ])
                //     ->columns(1),
                Wizard::make([
                    Step::make('Data KRS')
                        ->schema([
                            TextInput::make('nama')
                                ->label('Nama KRS')
                                ->required(),
                            TextInput::make('deskripsi')
                        ]),
                    Step::make('Input Mata Kuliah')
                        ->schema([
                            Repeater::make('matkul_krs')
                                ->relationship()
                                ->schema([
                                    Select::make('mata_kuliah_id')
                                        ->options(MataKuliah::query()->pluck('nama', 'id'))
                                        ->label('Mata Kuliah')
                                        ->native(false)
                                ])
                                ->mutateRelationshipDataBeforeCreateUsing(function (array $data): array {
                                    $data['user_id'] = auth()->id();
                                    return $data;
                                })
                                ->createItemButtonLabel('Tambah Mata Kuliah')
                                ->label('Daftar Tambah Mata Kuliah')
                                ->deletable(true)
                        ]),
                ])
                    ->columnSpanFull()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')
                    ->sortable(),
                TextColumn::make('deskripsi'),
                TextColumn::make('matkul_krs_count')
                    ->counts('matkul_krs')
                    ->label('Jumlah'),
            ])
            ->modifyQueryUsing(fn(Builder $query) => $query->where('user_id', auth()->user()->id))
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->label('Edit'),
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\DeleteAction::make()
                        ->label('Hapus'),
                ])
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make()
                    ->label('KRS Baru'),
            ])
            ->emptyStateHeading('Belum ada KRS')
            ->emptyStateDescription('Silakan membuat KRS baru');
    }

    public static function getRelations(): array
    {
        return [

        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKRS::route('/'),
            'create' => Pages\CreateKRS::route('/create'),
            'edit' => Pages\EditKRS::route('/{record}/edit'),
        ];
    }

    public function getHeading(): string
    {
        return __('KRS');
    }

    public function getTitle(): string
    {
        return __('MyKRS - KRS');
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('user_id', auth()->user()->id)->count();
    }
}
