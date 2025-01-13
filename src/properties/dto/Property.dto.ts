import { IsOptional, IsString, Validate } from 'class-validator';

export class PropertyDto {
    @IsString()
    name: string

    @IsString()
    number_registration: string

    @IsString()
    long: string

    @IsString()
    lat: string
}
