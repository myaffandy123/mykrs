<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\MatkulKRS;
use Filament\Tables\Table;
use App\Models\Visualisasi;
use Filament\Resources\Resource;
use Filament\Tables\Grouping\Group;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\VisualisasiResource\Pages;
use App\Filament\Resources\VisualisasiResource\RelationManagers;

class VisualisasiResource extends Resource
{
    protected static ?string $model = MatkulKRS::class;
    protected static ?string $navigationIcon = 'heroicon-o-presentation-chart-line';
    protected static ?string $navigationLabel = 'Visualisasi';
    protected static ?string $title = 'Visualisasi';
    protected static ?string $slug = 'visualisasi';
    protected static ?int $navigationSort = 3;

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
                TextColumn::make('mata_kuliah.nama')
                    ->label('Nama'),
                TextColumn::make('mata_kuliah.kode')
                    ->label('Kode'),
                TextColumn::make('mata_kuliah.sks')
                    ->label('SKS'),
                TextColumn::make('mata_kuliah.kelas')
                    ->label('Kelas'),
                TextColumn::make('mata_kuliah.ruang')
                    ->label('Ruang'),
                TextColumn::make('mata_kuliah.hari')
                    ->label('Hari'),
                TextColumn::make('mata_kuliah.jam_mulai')
                    ->label('Jam mulai')
                    ->time('H:i'),
                TextColumn::make('mata_kuliah.jam_selesai')
                    ->label('Jam selesai')
                    ->time('H:i'),
            ])
            ->modifyQueryUsing(fn(Builder $query) => $query->where('user_id', auth()->user()->id))
            // ->groups([
            //     Group::make('krs.nama')
            //         ->label('Nama KRS'),
            // ])
            // ->defaultGroup('krs.nama')
            ->defaultGroup(Group::make('k_r_s_id')
                ->label('KRS'))
                // ->getTitleFromRecordUsing(fn (Post $record): string => $record->status->getDescription()))
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->label('Lihat'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateHeading('Belum ada Visualisasi KRS')
            ->emptyStateDescription('Silakan membuat KRS baru dan menambahkan Mata Kuliah');
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
            'index' => Pages\ListVisualisasis::route('/'),
        ];
    }    

    public function getTitle(): string
    {
        return __('MyKRS - Mata Kuliah');
    }
}
