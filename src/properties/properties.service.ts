import { HttpException, HttpStatus, Injectable } from '@nestjs/common';
import { PropertyDto } from './dto/Property.dto';
import { PrismaService } from 'src/prismaService';

@Injectable()
export class PropertyService {
  
  constructor(private readonly prisma: PrismaService) {}
  async create(property: PropertyDto, userId: string):Promise<PropertyDto> {
    try {
      return await this.prisma.properties.create({
        data:{
          name: property.name,
          number_registration: property.number_registration,
          long: property.long,
          lat: property.lat,
          user_id: userId
        }
      });
    } catch (error) {
      throw new HttpException('Usuário não encontrado.', HttpStatus.NOT_FOUND);
    }
  }
  findAll(userId: string):Promise<PropertyDto[]> {
    try {
      return this.prisma.properties.findMany(
        {
          where: {
            user_id: userId
          }
        }
      );
    } catch (error) {
      throw new HttpException('Dados não encontrados.', HttpStatus.NOT_FOUND);
    }
  }
  async findOne(id: string):Promise<PropertyDto> {
    try {
      return await this.prisma.properties.findUnique({
        where: {
          id: id
        }
      })
    } catch (error) {
      throw new HttpException('Dado não encontrado.', HttpStatus.NOT_FOUND);
    }
  }
  async update(id: string, property: PropertyDto) {
    return await this.prisma.properties.update({
      where: {
        id: id
      },
      data: {
        name: property.name,
        number_registration: property.number_registration,
        long: property.long,
        lat: property.lat
      }
    })
  }
  async remove(id: string) {
    const user = await this.prisma.properties.findUnique({
      where: {
        id: id
      }
    })
    if(user != null){
      return this.prisma.properties.delete({
        where: {
          id: user.id
        }
      })
    }
    throw new HttpException('Dado não encontrado.', HttpStatus.NOT_FOUND);
  }
}
