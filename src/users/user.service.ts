import { HttpException, HttpStatus, Injectable } from '@nestjs/common';
import { PrismaService } from 'src/prismaService';
import { UserDto } from './dto/User.dto';
import * as bcrypt from 'bcrypt';

@Injectable()
export class UserService {
  constructor(private readonly prisma: PrismaService) {}

  async create(user: UserDto):Promise<UserDto> {
    try {
      const passwordHashed = await bcrypt.hash(user.password, 10)
      return await this.prisma.users.create({ 
        data: {
          name: user.name,  
          email: user.email,
          password: passwordHashed, 
          avatar: user.avatar? user.avatar : null
        } 
      });
    } catch (error) {
      throw new HttpException('Email já cadastrado', HttpStatus.CONFLICT);
    }
  }
  async findAll():Promise<UserDto[]> {
    try {
     return await this.prisma.users.findMany();
    } catch (error) {
      throw new HttpException('Dados não encontrados', HttpStatus.NOT_FOUND);
    }
  }
  async findOne(id: string):Promise<UserDto> {
    try {
      return await this.prisma.users.findUnique({
        where: {
          id: id
        }
      });
    } catch (error) {
      throw new HttpException('Dado não encontrado', HttpStatus.NOT_FOUND);
    }
  }

  async update(id: string, body: UserDto) {
    try {
       return await this.prisma.users.update({
          where: {
            id: id
          },
          data: {
            name: body.name,  
            email: body.email,
            password: body.password,
            avatar: body.avatar
          }
        })
    } catch (error) {
      throw new HttpException('Dado não encontrado', HttpStatus.NOT_FOUND);
    }
  }
  async remove(id: string) {
    try {
      const user = await this.prisma.users.findUnique({
        where: {
          id: id
        }
      })
      if(user != null){
        return this.prisma.users.delete({
          where: {
            id: user.id
          }
        })
      }
    } catch (error) {
      throw new HttpException('Dado não encontrado', HttpStatus.NOT_FOUND);
    }
  }
}
