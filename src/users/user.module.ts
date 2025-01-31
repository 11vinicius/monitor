import { Module } from '@nestjs/common';
import { UserService } from './user.service';
import { UserController } from './user.controller';
import { PrismaService } from 'src/prismaService';

@Module({
  controllers: [UserController],
  providers: [UserService, PrismaService],
  imports: []
})
export class UserModule {}
